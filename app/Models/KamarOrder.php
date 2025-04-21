<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarOrder extends Model
{
    use HasFactory;

    protected $table = 'kamar_orders';
    protected $guarded = ['id'];

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }
    public function booking(){
        return $this->hasOne(Booking::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function detailkamarorder(){
        return $this->hasMany(DetailKamarOrder::class,'kamar_orders_id');
    }
}
