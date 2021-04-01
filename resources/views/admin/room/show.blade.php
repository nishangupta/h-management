@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Room</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Show</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">{{$room->name}}</h3>
              <a href="{{route('room.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <div class="card-body">
              <x-input-error />

              <div class="row">
                <div class="col-12 col-md-6">
        
                  <div class="mb-3">
                    <p>Default Rate: {{number_format($room->rate)}}</p>
                  </div>

                  <div class="mb-3">
                    <p>Room Types: {{$room->roomType->title}}</p>
                  </div>

                  <div class="mb-3">
                    <p>Status: {{$room->status}}</p>
                  </div>
                  <div class="mb-3">
                    <p>Created at: {{$room->created_at}}</p>
                  </div>
    
                  <div class="mb-3">
                    <p>Updated at:{{$room->updated_at}}</p>
                  </div>

                  <div class="d-flex">
                    <a href="{{route('room.edit',$room)}}" class="btn btn-info mr-3">Edit</a>
                    <form action="{{route('room.destroy',$room)}}" method="POST">
                      @csrf @method('delete')
                      <button type="submit" class="dltBtn btn btn-danger">Delete</button>
                    </form>
                  </div>
                  
                </div>

                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <p>Description: {!!$room->description!!}</p>
                  </div>
                  <hr>
              </div>
            
            </div>
          </div>


          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Latest reservations</h3>
            </div>
            <div class="card-body">
              <x-input-error />

              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Customer Name</th>
                  <th>Room rate</th>
                  <th>Phone</th>
                  <th>Confirmation</th>
                  <th>Checkin</th>
                  <th>Checkout</th>
                  <th>Paid</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($reservations as $r)
                  <tr>
                    <td>{{$r->id}}</td>
                    <td><a href="{{route('reservation.show',$r->id)}}">{{$r->fname.' '.$r->lname}}</a></td>
                    <td>{{$r->room_rate}}</td>
                    <td>{{$r->phone}}</td>
                    <td>{{$r->confirmation_number}}</td>
                    <td>{{$r->checkin}}</td>
                    <td>{{$r->checkout}}</td>
                    <td><span class="badge badge-{{$r->status=='pending'?'danger':'info'}}">{{$r->status}}</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@push('js')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
$(function () {


  $("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
    "paging":true,
    "sorting":false,
  });

  $('.dltBtn').click(function(e){
    e.preventDefault()
    if(confirm('Are you sure to delete')){
      this.form.submit();
    }
  })
});
</script>
@endpush