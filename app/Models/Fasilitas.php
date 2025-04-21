<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $fillable = ['namafasilitas','keterangan'];

    public function kamar(){
        return $this->belongsToMany(Kamar::class)->withTimestamps();
    }
    public function detailkamar(){
        return $this->hasMany(FasilitasKamar::class,'fasilitas_id');
    }
}
