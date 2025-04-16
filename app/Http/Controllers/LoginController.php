<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\new_create_account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use HasApiTokens;
use Illuminate\Support\Facades\Hash; // ここでHashクラスをインポート

class LoginController extends Controller
{    // リクエストからメールアドレスとパスワードを取得
    public function login(LoginRequest $request)
    {
        $email = "qcomekukumi@gmail.com";
        $password = "8888";
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            //return response()->json(['user' => $user], 202);
            if (!$user) {
                return response()->json(['error' => 'ユーザーが見つかりません。'], 404);
            }
            $token = $user->createToken('AccessToken')->plainTextToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => '認証に失敗しました。'], 401);
        }

    }
    public function new_create_account(Request $request)
    {

        $name = $request->name;
        $password = $request->password;
        $email = $request->email;
        $user = new user;

        // if (is_null($user->where('email', $email)->where('password', $password)->where('name', $name)->first()))  { 
        //     echo "既に登録されています"; 
        // } else {

        //   };





    }
}