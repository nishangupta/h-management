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
              <h3 class="card-title">Update</h3>
              <a href="{{route('room.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-muted">
              <x-input-error />

              <form action="{{route('room.update',$room)}}" method="POST" enctype="multipart/form-data">
                @csrf @method('Put')

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Name/No</label>
                      <input type="text" name="name" placeholder="name" value="{{$room->name??old('name')}}" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Room Type</label>
                      <select name="room_type_id" class="form-control" id="">
                        @foreach($roomTypes as $r)
                        <option value="{{$r->id}}" {{$room->roomType->id == $r->id ?'selected':''}}>{{$r->title}}</option>
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
                        <option value="0" {{$room->is_reserved?'':'selected'}}>Available</option>
                        <option value="1" {{$room->is_reserved?'selected':''}}>Reserved</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Rate</label>
                      <input type="number" name="rate" placeholder="Rate" value="{{$room->rate??old('rate')}}" class="form-control" >
                    </div>
                  </div>
                <div>
               
                <br>
      
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="textarea form-control" name="description" placeholder="Short Description here">{{ 
                  $room->description??old('description')}}</textarea>
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
    $('.textarea').summernote({
      height:100
    })
  })
</script>
@endpush