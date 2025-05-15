<?php
namespace App\UseCases;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class UpdateUseCase
{
    public function index($data)
    {
        $user = User::create([
            'user_id' => $data['user_id'], // ← 配列なので [] を使う
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if (!$user) {
            return response('ユーザー作成失敗', 500);
        }
        Auth::login($user);
        return $user;
    }
}

