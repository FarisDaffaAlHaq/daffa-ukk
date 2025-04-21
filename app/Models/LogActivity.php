<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    //
    protected $table = "log_activities";
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
