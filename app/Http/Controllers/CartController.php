<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //Construct
    protected $cartRepository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $carts = $this->cartRepository->showCart();
            return view('page.cart')->with('carts', $carts);
        } else {
            request()->session()->flash('error', 'Please login for view cart!');
            return back();
        }
    }

    //Store product to cart
    public function addToCart(Request $request)
    {
        if (!Auth::user()) {
            request()->session()->flash('error', 'Please login for add product to cart!');
            return back();
        }
        $this->cartRepository->storeCartItem($request);
        request()->session()->flash('success', 'Product successfully added to cart');
        return back();
    }


    //Update cart quantity
    public function updateCart(Request $request)
    {
        if ($request->quantity) {
            $this->cartRepository->updateCartItem($request);
            return back()->with('success', 'Cart successfully updated!');
        } else {
            return back()->with('Cart Invalid!');
        }
    }

    //Remove product without cart
    public function removeCart($id)
    {
        $cart = $this->cartRepository->findCartItem($id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success', 'Cart successfully removed');
            return back();
        }
        request()->session()->flash('error', 'Error please try again');
        return back();
    }
}
