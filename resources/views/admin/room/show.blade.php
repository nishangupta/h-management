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
        </div>
      </div>
    </div>
  </section>
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