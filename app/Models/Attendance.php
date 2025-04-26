<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'clock_in',
        'clock_out',
        'break_time',
        'overtime',
        'status',
    ];

}
