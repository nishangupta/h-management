<?php

namespace App\Http\Controllers\Admin;

use App\Models\Billing;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    public function create($reservation){
        $reservation = Reservation::whereKey($reservation)->with('room')->first();
        $orders = $reservation->orders;
        
        //getting the days 
        $start = Carbon::parse($reservation->checkin.' '.$reservation->checkin_time);
        $end = Carbon::parse($reservation->checkout.' '.$reservation->checkout_time);
        $days = $end->diffInDays($start);

        if($reservation->checkout_time > 11){
            $days = $days +1;
        }
        if($days == 0){
            $days = 1; 
        }
        
        $subTotal = 0;
        foreach($orders as $o){
            $bal = $o->total_amount - $o->paid_amount;
            $subTotal += $bal;
        }   
        $roomRate = $reservation->room_rate * $days;

        $billing = $reservation->billing;
        $otherCost = 0;
        if($billing){
            $otherCost = $billing->telephone + $billing->misc + $billing->service_charge;
        }
        $grandTotal  = $roomRate + $subTotal + $otherCost;
        
        return view('admin.billing.create',compact('reservation','orders','days',
                'billing','subTotal','grandTotal','roomRate'));
    }
    
    public function show(Billing $billing){
        return view('admin.billing.show',compact($billing));
    }

    public function store(Request $request){
        $reservation = Reservation::whereKey($request->reservation)->first();
        $reservation->update([
            'feedback'=>$request->feedback
        ]);

        $billing = $reservation->billing;
        if($billing){
            $billing->update([
                'telephone'=>$request->telephone,
                'service_charge'=>$request->service_charge,
                'misc'=>$request->misc,
                'total'=>$request->total,
            ]);
        }else{
            Billing::create([
                'telephone'=>$request->telephone,
                'service_charge'=>$request->service_charge,
                'misc'=>$request->misc,
                'total'=>$request->total,
                'reservation_id'=>$request->reservation,
            ]);
        }
        return redirect(route('billing.create',$reservation->id));
    }
}
