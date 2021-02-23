<?php

namespace App\Http\Controllers;

use App\Cutomer;
use App\Item;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    //open all orders view
    public function index()
    {
        $orders = Order::leftjoin('items','items.id','orders.item_id')
                        ->leftjoin('cutomers','cutomers.id','orders.customer_id')
                        ->select('orders.id as order_id','cutomers.*','items.*','orders.*')
                        ->get();

        \LogActivity::addToLog('open a all orders ');

        return view('order.index',compact('orders'));
    }


    //open create a new order view
    public function create()
    {
        $customers= Cutomer::all();
        $items=Item::all();
        \LogActivity::addToLog('open a new order ');

        return view('order.add',compact('customers','items'));
    }


    //store a new order
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'item_id' => 'required',
            'qty' => 'required',
            'total' => 'required',


        ]);

        Order::create($validatedData);
        \LogActivity::addToLog('Added a new order ');

        return redirect()->back()->with('message','Successfully Added') ;

    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        //
    }
}
