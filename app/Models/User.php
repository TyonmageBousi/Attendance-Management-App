<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //登録・更新を許可するカラム
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture'
    ];

     //登録・更新を不許可するカラム
    protected $guarded = [
        'id',
    ];

}
