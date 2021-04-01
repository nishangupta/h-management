<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Order;
use App\Models\Income;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::with('room')->latest()->get();
        return view('admin.reservation.index',compact('reservations'));
    }

    public function create(){
        $rooms = Room::whereIsReserved(0)->select(['id','name','rate'])->get();
        return view('admin.reservation.create',compact('rooms'));
    }

    public function store(Request $request){
        $request->validate([
            'fname'=>'required|min:3',
            'lname'=>'required',
            'occupants'=>'required|integer',
            'phone'=>'required',
            'checkin'=>'required',
            'checkin_time'=>'required',
            'checkout'=>'required',
            'checkout_time'=>'required',
            'room_id'=>'required',
            'room_rate'=>'required',
        ]);
        
        $conf_no = Str::random(10);

        DB::table('rooms')->where('id',$request->room_id)->update([
            'is_reserved'=>1 //is_reserved
        ]);
        $reservation = Reservation::create([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'occupants'=>$request->occupants,
            'phone'=>$request->phone,
            'checkin'=>$request->checkin,
            'checkin_time'=>$request->checkin_time,
            'checkout'=>$request->checkout,
            'checkout_time'=>$request->checkout_time,
            'room_id'=>$request->room_id,
            'room_rate'=>$request->room_rate,
            'confirmation_number'=>$conf_no,
        ]);
        return redirect()->route('reservation.show',$reservation->id)->with('success','Reservation created!');
    }
    
    public function show($reservation){
        $reservation = Reservation::whereKey($reservation)->with('room')->first();
        $orders = $reservation->orders()->withCount('orderProducts')->latest()->get();
        return view('admin.reservation.show',compact('reservation','orders'));
    }

    public function edit(Reservation $reservation){
        $rooms = Room::select(['id','name','rate'])->get();
        return view('admin.reservation.edit',compact('reservation','rooms'));
    }

    public function update(Request $request,Reservation $reservation){
        $request->validate([
            'fname'=>'required|min:3',
            'lname'=>'required',
            'occupants'=>'required|integer',
            'phone'=>'required',
            'checkin'=>'required',
            'checkin_time'=>'required',
            'checkout'=>'required',
            'checkout_time'=>'required',
            'room_id'=>'required',
            'room_rate'=>'required',
        ]);

        DB::table('rooms')->where('id',$reservation->room_id)->update([
            'is_reserved'=>0 //is_reserved
        ]);

        $reservation->update([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'occupants'=>$request->occupants,
            'phone'=>$request->phone,
            'checkin'=>$request->checkin,
            'checkin_time'=>$request->checkin_time,
            'checkout'=>$request->checkout,
            'checkout_time'=>$request->checkout_time,
            'room_id'=>$request->room_id,
            'room_rate'=>$request->room_rate,
            // 'confirmation_number'=>$conf_no,
        ]);
        
        DB::table('rooms')->where('id',$request->room_id)->update([
            'is_reserved'=>$reservation->status=='paid'?0:1,
        ]);

        return redirect()->route('reservation.show',$reservation->id)->with('success','Reservation updated!');
    }
    
    public function destroy(Reservation $reservation){
        DB::table('rooms')->where('id',$reservation->room_id)->update([
            'is_reserved'=>0 //is_reserved
        ]);
        $reservation->delete();
        return redirect()->route('reservation.index')->with('success','reservation deleted');
    }

    public function filter(Request $request){
        if($request->datepicker){
            $data = explode('-',$request->datepicker);
            $start = Carbon::parse($data[0]);
            $end = Carbon::parse($data[1]);
            
            $reservations = Reservation::whereBetween('created_at',[$start,$end])->get();
        }else{
            $reservations = Reservation::whereDay('created_at',Carbon::today())->get();
        }
        
        return view('admin.reservation.index',compact('reservations'));
    }
}
