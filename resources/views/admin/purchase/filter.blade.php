@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Purchase Filtering</h1>
        </div>
        <div class="col-sm-6">
          <a href="{{route('purchase.index')}}" class="btn btn-secondary btn-sm float-right">Go back</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="container-fluid">
        <form action="{{route('purchase.filter')}}" method="Get">
            <label>Date range:</label>
            <div class="form-group form-inline">
      
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control" name="datepicker" id="datePicker" value="{{request()->datepicker}}" >
              </div>
              
            <button type="submit" class="btn btn-primary ml-2">Search</button>
          </div>
        </form>
        
        <p class="h5 text-info m-2 text-center">Showing results for: {{request()->datepicker}}</p>
  
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <div class="card-body">
              <x-input-error/>
              <x-alert-msg/>
           
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sn</th>
                  <th>Product</th>
                  <th>Cost Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Created at</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($purchases as $purchase)
                  <tr>
                    <td>{{$purchase->id}}</td>
                    <td><a href="{{route('purchase.show',$purchase->id)}}">{{$purchase->product->title}}</a></td>
                    <td>{{$purchase->cost_price}}</td>
                    <td>{{$purchase->qty}}</td>
                    <td>{{$purchase->cost_price*$purchase->qty}}</td>
                    <td>{{$purchase->created_at->format('Y/m/d')}}</td>
                    <td>
                      <form action="{{route('purchase.destroy',$purchase)}}" method="POST">
                        @csrf @method('delete')
                        <button class="btn dltBtn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@push('js')
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  
  $(function () {
    $('#datePicker').daterangepicker({
      locale: {
        format: 'YYYY/MM/DD'
      }
    })

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "searching": true,
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