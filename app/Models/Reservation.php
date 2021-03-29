<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Order;
use App\Models\Billing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function getOrderWithProductsAttribute(){
        return $this->with('orders.orderProducts')->latest()->get();
    }

    public function billing(){
        return $this->hasOne(Billing::class);
    }
}

