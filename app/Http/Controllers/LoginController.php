<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\new_create_account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use HasApiTokens;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        // リクエストからメールアドレスとパスワードを取得
        $email = $request->email;
        $password = $request->password;

        // ユーザーが存在するか確認
        $user = User::where('email', $email)->first();
        //dd($user);
        // ユーザーが存在しないか、パスワードが間違っている場合


        // ユーザーをログイン
        Auth::login($user);
        //ログイン中のユーザー情報を取得
        $user = Auth::user();

        dd($user->name);

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
        $token = $user->createToken('User Registration Token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
        dd($token);
        //   };





    }
}