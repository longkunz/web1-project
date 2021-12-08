<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    //Construct
    protected $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderRepository->getOrder(10);
        return view('backend.order.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'numeric|required',
            'email' => 'string|required',
            'total' => 'integer|required',
            'sub_total' => 'integer|required',
            'shipping' => 'numeric|required',
        ]);
        // return $request->all();

        if (empty(Cart::where('user_id', auth()->user()->id)->where('order_id', null)->first())) {
            request()->session()->flash('error', 'Cart is Empty !');
            return back();
        }

        
        $order = new Order();
        $order_data = $request->all();
        $order_data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
        $order_data['user_id'] = $request->user()->id;
        $order_data['sub_total'] = $request->sub_total;
        $order_data['quantity'] = $request->quantity;
        $order_data['coupon'] = $request->coupon;
        $order_data['total_amount'] = $request->total;
        $order_data['address'] = $request->address;

        // return $order_data['total_amount'];
        $order_data['status'] = "new";
        $order->fill($order_data);
        $order->save();
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);
        request()->session()->flash('success', 'Your product successfully placed in order');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->findOrder($id);
        return view('backend.order.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->findOrder($id);
        return view('backend.order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|in:new,process,delivered,cancel'
        ]);
        $order = $this->orderRepository->findOrder($id);
        $order['status'] = $request->status;
        $status = $order->save();
        if ($status) {
            request()->session()->flash('success', 'Order Successfully updated');
        } else {
            request()->session()->flash('error', 'Order can not updated');
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->findOrder($id);
        if ($order) {
            $status = $order->delete();
            if ($status) {
                request()->session()->flash('success', 'Order Successfully deleted');
            } else {
                request()->session()->flash('error', 'Order can not deleted');
            }
            return redirect()->route('order.index');
        } else {
            request()->session()->flash('error', 'Order not found');
            return redirect()->back();
        }
    }
}