@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Room</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Create</h3>
              <a href="{{route('room.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-muted">
              <x-input-error />

              <form action="{{route('room.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Name/No</label>
                      <input type="text" name="name" placeholder="name" value="{{old('name')}}" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Room Type</label>
                      <select name="room_type_id" class="form-control" id="">
                        @foreach($roomTypes as $r)
                        <option value="{{$r->id}}">{{$r->title}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                <div>
               
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Status</label>
                      <select name="is_reserved" class="form-control" id="">
                        <option value="0">Available</option>
                        <option value="1">Reserved</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Rate</label>
                      <input type="number" name="rate" placeholder="Rate" value="{{old('rate')}}" class="form-control" >
                    </div>
                  </div>
                <div>
               
                <br>
      
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="textarea form-control" name="description" placeholder="Short Description here">{{ old('description')}}</textarea>
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
    $('.textarea').summernote({
      height:150
    })
  })
</script>
@endpush