<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // 追加
use Illuminate\Database\Eloquent\Factories\HasFactory; // これを追加


class User extends Authenticatable
{

    use HasApiTokens, HasFactory; // これも追加
    // 登録・更新を許可するカラム
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'profile_picture'
    ];

    // 登録・更新を不許可にするカラム（もし使いたい場合はこっちを使う）
    // protected $guarded = ['id'];
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
