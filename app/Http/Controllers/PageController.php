<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class PageController extends Controller
{
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
    //Index page
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('index')->with('products', $products);
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('title', 'like', '%' . $req->key . '%')
            ->orwhere('summary', $req->key)
            ->get();

        return view('page.search', compact('product'));
    }

    //Checkout page
    public function checkout()
    {
        $cart = Cart::with('product')->where('order_id', null)->where('user_id', Auth::user()->id)->orderBy('id', 'ASC')->get();
        return view('page.checkout')->with('cart', $cart);
    }
}
