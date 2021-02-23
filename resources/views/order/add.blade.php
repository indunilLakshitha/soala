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

    <h1>Order Add</h1><br><br>
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card p-3">
            <form class="form-horizontal" method="POST" action='{{ route("order.store")}}'>
                {{ csrf_field() }}
                <div class="form-row" >

                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Customer Name</label>
                    <select class="form-control" id="customer_id" name="customer_id" value="{{ old('customer_id') }}" required >
                        <option value="0">Select a customer</option>
                        @foreach ($customers as $customer)

                        <option value="{{$customer->id}}">{{$customer->cus_name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('customer_id'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('item_id') }}</strong>
                      </span>
                    @endif
                </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">item name</label>
                    <select class="form-control" id="item_id" name="item_id" value="{{ old('item_id') }}" required >
                        <option value="0">Select a Item</option>
                        @foreach ($items as $item)

                        <option value="{{$item->id}}">{{$item->item_name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('item_id'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('item_id') }}</strong>
                        </span>
                     @endif
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Qty</label>
                      <input type="text" class="form-control" id="qty" value="{{ old('qty') }}" name="qty" placeholder="qty" autofocus oninput="caltotal()">
                      @if ($errors->has('qty'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('qty') }}</strong>
                      </span>
                     @endif
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Total</label>
                      <input type="number" name="total" class="form-control"  value="{{  old('total') }}" id="total" placeholder="Total value"  autofocus>
                      @if ($errors->has('mobile'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                      </span>
                  @endif
                    </div>
                  </div>
                {{-- <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Area</label>
                      <input type="text" class="form-control" id="area" value="{{ old('area') }}" name="area" placeholder="Area" autofocus >
                      @if ($errors->has('area'))
                      <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('area') }}</strong>
                      </span>
                     @endif
                    </div>
                    <div class="form-group col-md-6">

                    </div>
                  </div> --}}
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

function caltotal(){
    var item = item_id.value
    var str1 = document.getElementById("qty").value
    $.ajax({
                type: 'POST',
                url: '{{('/getitemprice')}}',
                data: {"_token": "{{ csrf_token() }}",
                        'item_id': item} ,
                success: function(data){
                    // console.log(data);
                    var total= parseFloat(data) * parseInt(str1)
                    console.log(total);
                    document.getElementById("total").value=total

                }
            })
}

</script>
    @endsection
