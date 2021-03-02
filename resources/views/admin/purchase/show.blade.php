@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Purchase</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('purchase.index')}}">Purchase</a></li>
            <li class="breadcrumb-item active">Show</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Purchase details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <x-input-error />

              <div class="row">
                <div class="col-12 col-md-6">

                  <div class="mb-3">
                    <p>Price: {{$purchase->cost_price}}</p>
                  </div>
    
                  <div class="mb-3">
                    <p>Unit/Quantity: {{$purchase->qty}}</p>
                  </div>
    
                  <div class="mb-3">
                    <p>Created at: {{$purchase->created_at}}</p>
                  </div>
    
                  <div class="mb-3">
                    <p>Updated at:{{$purchase->updated_at}}</p>
                  </div>

                  <div class="d-flex">
                    <a href="{{route('purchase.edit',$purchase)}}" class="btn btn-info mr-3">Edit</a>
                    <form action="{{route('purchase.destroy',$purchase)}}" method="POST">
                      @csrf @method('delete')
                      <button type="submit" class="dltBtn btn btn-danger">Delete</button>
                    </form>
                  </div>
                  
                </div>

                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <p class="h5">Product: <a href="{{route('product.show',$purchase->product->id)}}">{{$purchase->product->title}}</a></p>
                  </div>

                  <div class="mb-3">
                    <p class="h5">Supplier: <a href="{{route('supplier.show',$purchase->supplier->id)}}">{{$purchase->supplier->name}}</a></p>
                  </div>
              </div>
            
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

@push('js')
<script>
  $(document).ready(function(){
    $('.dltBtn').click(function(e){
      e.preventDefault();
      if(confirm('Are you sure to delete!')){
        this.form.submit();
      }
    })
  })
</script>
@endpush