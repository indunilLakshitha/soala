@extends('layouts.backend.app')

@section('content')

@if(session()->has('message'))

    <div class="card-body">
      <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
          <span class="badge badge-pill badge-primary">Success</span>
          {{ session()->get('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
      </div>
@endif



<div class="container">

    <h1>Customer Edit</h1><br><br>
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card p-3">



            <form class="form-horizontal" method="POST" action='{{ route("customer.update")}}'>
                {{ csrf_field() }}
                <div class="form-row" >

                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Customer Name</label>
                    <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="customer Name" value="{{$customer->cus_name}}"  autofocus>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="customer Name" value="{{$customer->id}}"  >
                    @if ($errors->has('cus_name'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('cus_name') }}</strong>
                      </span>
                    @endif
                </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">NIC</label>
                    <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC" value="{{$customer->nic}}"  autofocus>
                    @if ($errors->has('nic'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('nic') }}</strong>
                        </span>
                     @endif
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Address</label>
                      <input type="text" class="form-control" id="address" value="{{$customer->address}}" name="address" placeholder="Address" autofocus >
                      @if ($errors->has('address'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('address') }}</strong>
                      </span>
                     @endif
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Mobile</label>
                      <input type="number" name="mobile" class="form-control"  value="{{$customer->mobile}}" id="package_rolls" placeholder="Mobile Number"  autofocus>
                      @if ($errors->has('mobile'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                      </span>
                  @endif
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Area</label>
                      <input type="text" class="form-control" id="area" value="{{$customer->area}}" name="area" placeholder="Area" autofocus >
                      @if ($errors->has('area'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('area') }}</strong>
                      </span>
                     @endif
                    </div>
                    <div class="form-group col-md-6">

                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
              </form>



            </div>
        </div>
    </div>
</div>


    @endsection
