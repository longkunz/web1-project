<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Models\Category;

class PageController extends Controller
{
    //Index page
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get()->take(16);
        $banners = Banner::orderBy('id', 'DESC')->where('status', 'active')->get();
        $cate1 = Category::where('status', 'active')->where('id', 1)->first();
        $cate2 = Category::where('status', 'active')->where('id', 2)->first();
        $cate3 = Category::where('status', 'active')->where('id', 3)->first();
        $cate4 = Category::where('status', 'active')->where('id', 4)->first();
        $best = Cart::with('product')->get()->take(8);
        return view('index')->with('products', $products)
            ->with('banners', $banners)
            ->with('cate1', $cate1)
            ->with('cate2', $cate2)
            ->with('cate3', $cate3)
            ->with('cate4', $cate4)
            ->with('best', $best);
    }
    //Trang đổi password cua user
    public function changeUserPassword()
    {
        $profile = Auth()->user();
        return view('user.layouts.userPasswordChange')->with('profile', $profile);
    }
    //User order index
    public function orderIndex()
    {
        $orders = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(10);
        return view('user.order.index')->with('orders', $orders);
    }
    //User order delete
    public function userOrderDelete($id)
    {
        $order = Order::find($id);
        if ($order) {
            if ($order->status == "process" || $order->status == 'delivered' || $order->status == 'cancel') {
                return redirect()->back()->with('error', 'You can not delete this order now');
            } else {
                $status = $order->delete();
                if ($status) {
                    request()->session()->flash('success', 'Order Successfully deleted');
                } else {
                    request()->session()->flash('error', 'Order can not deleted');
                }
                return redirect()->route('user.order.index');
            }
        } else {
            request()->session()->flash('error', 'Order can not found');
            return redirect()->back();
        }
    }
    //User order show detail
    public function orderShow($id)
    {
        $order = Order::find($id);
        // return $order;
        return view('user.order.show')->with('order', $order);
    }
    //Xu ly user logout
    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success', 'Logout successfully');
        return route('index');
    }
    public function profileUpdate(Request $request, $id)
    {
        // return $request->all();
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->fill($data);
        $user['name'] = $request->name;
        $user['photo'] = $request->photo;
        $status = $user->save();
        if ($status) {
            request()->session()->flash('success', 'Successfully updated your profile');
        } else {
            request()->session()->flash('error', 'Please try again!');
        }
        return redirect()->back();
    }
    //Doi pass user
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        request()->session()->flash('success', 'Password successfully changed');
        return redirect()->route('user.profile');
    }
    //Trang profile của user
    public function userProfile()
    {
        $profile = Auth()->user();
        return view('user.users.profile')->with('profile', $profile);
    }
    //Hiển thị toàn bộ order của user
    public function userOrder($id)
    {
        $order = Order::find($id);
        // return $order;
        return view('user.order.show')->with('order', $order);
    }

    //Checkout page
    public function checkout()
    {
        $cart = Cart::with('product')->where('order_id', null)->where('user_id', Auth::user()->id)->orderBy('id', 'ASC')->get();
        return view('page.checkout')->with('cart', $cart);
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('title', 'like', '%' . $req->key . '%')
            ->orwhere('summary', $req->key)
            ->get();

        return view('page.search', compact('product'));
    }

}
