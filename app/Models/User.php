<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // 追加

class User extends Authenticatable
{
    // 登録・更新を許可するカラム
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture'
    ];

    // 登録・更新を不許可にするカラム（もし使いたい場合はこっちを使う）
    // protected $guarded = ['id'];

    use HasApiTokens; // Sanctumトレイトを追加
}
