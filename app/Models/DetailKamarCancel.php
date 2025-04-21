<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKamarCancel extends Model
{
    use HasFactory;

    public function bookings(){
        return $this->belongsTo(Booking::class);
    }
    public function kamars(){
        return $this->belongsTo(Kamar::class);
    }
    public function kamarorder(){
        return $this->belongsTo(KamarOrder::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
