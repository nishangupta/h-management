<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class);
    }

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
    
}
