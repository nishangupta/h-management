<?php

namespace App\Models;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function getStatusAttribute(){
        return $this->is_reserved?'Reserved':'Available';
    }
    
    public function roomType(){
        return $this->belongsTo(RoomType::class);
    }

    public function availableRooms(){
        return Room::where('is_reserved',0)->get();
    }
    public function reservedRooms(){
        return Room::where('is_reserved',1)->get();
    }

    public function getCurrentReservationAttribute(){
        return $this->reservations->last();
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}

