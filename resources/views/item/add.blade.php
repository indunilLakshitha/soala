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

    <h1>Item Add</h1><br><br>
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card p-3">



            <form class="form-horizontal" method="POST" action='{{ route("item.store")}}'>
                {{ csrf_field() }}
                <div class="form-row" >

                  <div class="form-group col-md-6">
                    <label for="inputEmail4">item Name</label>
                    <input type="text" class="form-control" id="item_name" name="item_name" placeholder="item Name" value="{{  old('item_name') }}"  autofocus>
                    @if ($errors->has('item_name'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('item_name') }}</strong>
                      </span>
                    @endif
                </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Available QTY</label>
                    <input type="text" class="form-control" id="available_qty" name="available_qty" placeholder="available_qty" value="{{  old('available_qty') }}"  autofocus>
                    @if ($errors->has('available_qty'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('available_qty') }}</strong>
                        </span>
                     @endif
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">price</label>
                      <input type="text" class="form-control" id="price" value="{{ old('price') }}" name="price" placeholder="price" autofocus >
                      @if ($errors->has('price'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('price') }}</strong>
                      </span>
                     @endif
                    </div>
                    <div class="form-group col-md-6">

                    </div>
                  </div>

                <button type="submit" class="btn btn-primary">Create</button>
              </form>



            </div>
        </div>
    </div>
</div>


    @endsection
