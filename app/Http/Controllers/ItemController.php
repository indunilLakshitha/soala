<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('item.index');
        \LogActivity::addToLog('View item List');

    }


    public function create()
    {
        return view('item.add');
        \LogActivity::addToLog('open item add view');

    }


    public function store(Request $request)
    {
        // validating
        $validatedData = $request->validate([
            'item_name' => 'required|unique:items',
            'available_qty' => 'required',
            'price' => 'required',


        ]);

        Item::create($validatedData);
        \LogActivity::addToLog('Added a new item ');

        return redirect()->back()->with('message','Successfully Added') ;
    }


public function getitemPrice(Request $request){
        $price=Item::where('id',$request->item_id)->first()->price;
        return response()->json($price);

}


    // public function edit( $cutomer)
    // {
    //     $customer= Item::where('id',$cutomer)->first();
    //     \LogActivity::addToLog('open  Customer edit');

    //    return view('customer.edit',compact('customer'));
    // }


    // public function update(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'cus_name' => 'required',
    //         'nic' => 'required',
    //         'address' => 'required',
    //         'area' => 'required',

    //         'mobile' =>'required|numeric|min:1',

    //     ]);

    //     $customer =Cutomer::where('id',$request->id)->first();
    //     $customer->cus_name=$request->cus_name;
    //     $customer->address=$request->address;
    //     $customer->nic=$request->nic;
    //     $customer->area=$request->area;
    //     $customer->mobile=$request->mobile;

    //     $customer->save();
    //     \LogActivity::addToLog('update a  Customer ');

    //     return redirect()->back()->with('message','Successfully Updated') ;

    // }

}
