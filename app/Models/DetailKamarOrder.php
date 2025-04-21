<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKamarOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_kamar_orders';

    protected $fillable = ['kamar_orders_id','bookings_id','kamars_id','jumlah_penginap','lama_menginap','tanggal_checkin','tanggal_checkout','totalharga','dp_dibayar','user_id'];

    public function bookings(){
        return $this->belongsTo(Booking::class);
    }
    public function kamars(){
        return $this->belongsTo(Kamar::class);
    }
    public function kamarorder(){
        return $this->belongsTo(KamarOrder::class);
    }
}
