<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;

    protected $table = 'tipe_kamars';
    protected $guarded = ['id'];

    public function kamar(){
        return $this->hasOne(Kamar::class);
    }
}
