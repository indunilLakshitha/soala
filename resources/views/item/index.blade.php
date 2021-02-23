@extends('layouts.backend.app')

@section('content')

<div class="container-fluid col-12">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-heading">
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <strong class=" ">Items</strong>
                            <a href="{{ route('item.create') }}"><button class="btn btn-primary mb-3 ml-5"> <i class="fa fa-plus"></i> </button></a>
                          </div>
                    </div>
                </div>
            </div>
      </div>
  </div>
</div>

<div class="container-fluid col-12">
  <div class="row">
      <div class="col-md-12">
          <div class="card p-3">
                <table id="example" class="display"  class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>item Name</th>
                            <th>Available Aty</th>
                            <th>Price</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    @php
                    $items= App\Item::all();
                @endphp
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->available_qty }}</td>
                            <td>{{ $item->price }}</td>

                            <td>
                              {{-- <a class="mr-3" href='{{ route("customers.show",$customer->id ) }}' > <button class="btn btn-primary"> <i class="fa fa-info mx-2"></i></button></a> --}}
                              {{-- <a class="mr-3" href='/customers/edit/{{$item->id }}' > <button class="btn btn-warning"> <i class="fa fa fa-edit mx-2"></i></button></a> --}}

                            </th>
                        </tr>
                        @endforeach

                    </tbody>

                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>item Name</th>
                            <th>Available Aty</th>
                            <th>Price</th>

                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>


                <form action="customerdeactivate" method="POST" id="deactivate_form">
                    {{csrf_field()}}
                <input  type="hidden" name="id" id="hidden_deactive">
                </form>

                <form action="customeractivate" method="POST" id="activate_form">
                  {{csrf_field()}}
                <input  type="hidden" name="id" id="hidden_active" >
                </form>

        </div>
      </div>
    </div>
</div>
<script>
//DataTable Script
$(document).ready(function() {
            $('#example').DataTable();
      });

//activate customer sweet alert
function sweet_alert_activate(id){
      Swal.fire({
            title: 'Do you want to Activate ?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            })
            .then((result) => {
              if (result.value) {
                return activate_customer(id)
              }
            })
     }
//Deactivate customer sweet alert
function sweet_alert_deactivate(id){
      Swal.fire({
            title: 'Do you want to Deactivate ?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            })
            .then((result) => {
              if (result.value) {
                return deactivate_customer(id)
              }
            })
     }

     //activate button scirpt
     function activate_customer(id) {
        document.querySelector('#hidden_active').value = id;
        document.querySelector('#activate_form').submit()

    }
    //deavtivate button scirpt
    function deactivate_customer(id) {
       document.querySelector('#hidden_deactive').value = id;
       document.querySelector('#deactivate_form').submit()

   }

</script>


@endsection
