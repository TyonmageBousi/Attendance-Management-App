<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\new_create_account;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); 
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
            dd("認証");
        }
    }

    public function new_login(){

        return view('new_login'); 
    }

    public function new_create_account(new_create_accountRequest $request){
        
        $name = $request-> name;
        $password = $request-> password;
        $email = $request -> email;
        $user = new user;

        if (is_null($user->where('email', $email)->where('password', $password)->where('name', $name)->first()))  { 
            echo "既に登録されています"; 
        } else {

        };
        



        
    }
}