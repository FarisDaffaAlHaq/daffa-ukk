<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $table = 'bookings';

    // protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }
    public function detailkamarorder(){
        return $this->hasMany(DetailKamarOrder::class);
    }
    public function detailkamarcancel(){
        return $this->hasMany(DetailKamarCancel::class);
    }
    protected $fillable = ['user_id','kamar_id','kodebooking','jumlah_penginap','tanggal_rencanacheckin','tanggal_rencanacheckout','totalharga','lama_menginap','status'];
}
