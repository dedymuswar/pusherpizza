<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusChanged;
use App\Order;
use App\Progress;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $orders = Order::where('user_id', $user)->get();
        return view('order.home', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validation = Validator::make($request->all(), [
        //     'costumer' =>    'required',
        //     'topping' =>    'required',
        //     'status' =>    'required',
        // ]);
        $user = auth()->user()->id;
        $order = new Order();
        $order->user_id    =   $user;
        $order->topping    =   $request->topping;
        $order->size    =   $request->size;
        $order->progress_id    =   1;
        $order->save();

        return redirect()->route('order.index')->with('success', 'Berhasil menambahkan order!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $where = array('id' => $id);
        $order  = Order::where($where)->first();
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $order  = Order::where($where)->first();

        $progress = Progress::all();
        return view('order.edit', compact('order', 'progress'));
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
            'status'         =>   'required'
        ]);

        $order = Order::findOrFail($id);
        $order->progress_id    =   $request->status;
        // dd($order);
        $order->save();
        event(new OrderStatusChanged($order));
        return redirect()->route('order.index')->with('success', 'Success edit order!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
