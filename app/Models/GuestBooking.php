<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBooking extends Model
{
    use HasFactory;

    protected $table = 'guest_bookings';
    protected $guarded = ['id'];

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }
}
