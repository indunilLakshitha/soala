<?php

namespace App\Http\Controllers;

use App\Cutomer;
use Illuminate\Http\Request;

class CutomerController extends Controller
{

    public function index()
    {
        return view('customer.index');
        \LogActivity::addToLog('View Customer List');

    }


    public function create()
    {
        return view('customer.add');
        \LogActivity::addToLog('open Customer add view');

    }


    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'cus_name' => 'required',
            'nic' => 'required|unique:cutomers',
            'address' => 'required',
            'area' => 'required',
            'mobile' =>'required|numeric|min:1',

        ]);

        Cutomer::create($validatedData);
        \LogActivity::addToLog('Added a new Customer ');

        return redirect()->back()->with('message','Successfully Added') ;
    }


    public function show(Cutomer $cutomer)
    {
        //
    }


    public function edit( $cutomer)
    {
        $customer= Cutomer::where('id',$cutomer)->first();
        \LogActivity::addToLog('open  Customer edit');

       return view('customer.edit',compact('customer'));
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'cus_name' => 'required',
            'nic' => 'required',
            'address' => 'required',
            'area' => 'required',

            'mobile' =>'required|numeric|min:1',

        ]);

        $customer =Cutomer::where('id',$request->id)->first();
        $customer->cus_name=$request->cus_name;
        $customer->address=$request->address;
        $customer->nic=$request->nic;
        $customer->area=$request->area;
        $customer->mobile=$request->mobile;

        $customer->save();
        \LogActivity::addToLog('update a  Customer ');

        return redirect()->back()->with('message','Successfully Updated') ;

    }

    public function destroy(Cutomer $cutomer)
    {
        //
    }
}
