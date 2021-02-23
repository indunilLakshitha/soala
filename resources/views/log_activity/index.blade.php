@extends('layouts.backend.app')

@section('content')

<div class="container-fluid col-12">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-heading">
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <strong class=" ">Log Activity</strong>
                            {{-- <a href="{{ route('customer.create') }}"><button class="btn btn-primary mb-3 ml-5"> <i class="fa fa-plus"></i> </button></a> --}}
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
            <table class="table table-bordered" id="example">
                <tr>
                    <th>No</th>
                    <th>Subject</th>
                    <th>URL</th>
                    <th>Method</th>
                    <th>Ip</th>
                    <th width="300px">User Agent</th>
                    <th>User Id</th>
                    <th>Action</th>
                </tr>
                @if($logs->count())
                    @foreach($logs as $key => $log)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $log->subject }}</td>
                        <td class="text-success">{{ $log->url }}</td>
                        <td><label class="label label-info">{{ $log->method }}</label></td>
                        <td class="text-warning">{{ $log->ip }}</td>
                        <td class="text-danger">{{ $log->agent }}</td>
                        <td>{{ $log->user_id }}</td>
                        <td><button class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    @endforeach
                @endif
            </table>



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
