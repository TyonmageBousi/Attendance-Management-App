<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'clock_in',
        'clock_out',
        'break_time',
        'overtime',
        'status',
    ];
    protected $guarded = ['user_id'];

    // メソッド名は複数形
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeNowMonth($query)
    {
        return $query->whereYear('updated_at', now()->year)
            ->whereMonth('updated_at', now()->month);
    }

}

