<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        dd('HELLO, world');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = new User;

        if (is_null($user->where('email', $email)->where('password', $password)->first()))  { //パスワードハッシュ化
            echo "レコードなし"; //リダイレクト 
        } else {
            //はるきのAPIに情報を返す処理
            //とみっくばかやろ
        }
    }
}