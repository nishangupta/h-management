@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Reservation</h1>
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
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Create</h3>
          <a href="{{route('reservation.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
        </div>
        <div class="card-body text-muted">
          <x-input-error />

          <form action="{{route('reservation.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" name="fname" placeholder="fname" value="{{old('fname')}}" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" name="lname" placeholder="lname" value="{{old('lname')}}" class="form-control" required>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label for="">Occupants</label>
                  <input type="number" name="occupants" placeholder="occupants" value="{{old('occupants')??1}}"  class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Phone</label>
                  <input type="text" name="phone" placeholder="phone" value="{{old('phone')}}" class="form-control" required>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">Checkin Date</label>
                  <input type="date" name="checkin" placeholder="checkin" value="{{old('checkin')}}" class="form-control" required>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="">Checkin Time</label>
                  <input type="time" name="checkin_time" placeholder="checkin_time" value="{{old('checkin_time')}}" class="form-control" required>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">Checkout Date</label>
                  <input type="date" name="checkout" placeholder="checkout" value="{{old('checkout')}}" class="form-control" required>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="">Checkout Time</label>
                  <input type="time" name="checkout_time" placeholder="checkout_time" value="{{old('checkout_time')}}" class="form-control" required>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label for="">Room</label>
                  <select name="room_id"  id="room-selectize" required>
                    <option selected disabled>Choose a room</option>
                    @foreach($rooms as $room)
                    <option value="{{$room->id}}">{{$room->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Rate</label>
                  <input type="number" id="rate" name="room_rate" placeholder="Rate" value="{{old('rate')}}" class="form-control" required >
                </div>
              </div>
            <div>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
 $(document).ready(function () {
    const rooms = @json($rooms)

    $('#room-selectize').selectize({
        sortField: 'text',
        onChange: function(value) {
          setRate(value);
        }
    });

    function setRate(id){
      let room = rooms.find(i=>i.id == id)
      $('#rate').val(room.rate)
      // alert(room)      
    }

  })
</script>
@endpush