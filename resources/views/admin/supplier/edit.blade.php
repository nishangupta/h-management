@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Supplier</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('supplier.index')}}">suppliers</a></li>
            <li class="breadcrumb-item active">Update</li>
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
              <h3 class="card-title">Update</h3>
              <a href="{{route('supplier.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-muted">
              <x-input-error />

              <form action="{{route('supplier.update',$supplier)}}" method="POST" enctype="multipart/form-data">
                @csrf @method('Put')
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" >Name*</label>
                      <input type="text" name="name" placeholder="name" value="{{$supplier->name??old('name')}}" class="form-control" required autofocus>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" >Email</label>
                      <input type="email" name="email" placeholder="email" value="{{$supplier->email??old('email')}}" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="my-2">
                      <label for="">Phone (optional)</label>
                      <input type="text" name="phone" placeholder="phone" value="{{$supplier->phone??old('phone')}}" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="my-2">
                      <label for="">Address (optional)</label>
                      <input type="text" name="address" placeholder="address " value="{{$supplier->address??old('address')}}" class="form-control" >
                    </div>
                  </div>
                </div>
               
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
              </form>
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
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
@endpush

@push('js')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
 $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endpush