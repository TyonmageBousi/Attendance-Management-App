<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UseCases\Loginuser;

use Illuminate\Support\Facades\Hash; // ここでHashクラスをインポート

class LoginController extends Controller
{    // リクエストからメールアドレスとパスワードを取得


    public function login(LoginRequest $request, )
    {
        $user = $request->all(); // ここで配列としてデータを受け取ります
        $email = $user['email']; // 配列から値を取得
        $password = $user['password']; // 配列から値を取得
        
        // 認証を試みる
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // 認証に成功した場合
            $user = Auth::user(); // 認証されたユーザーを取得
            return response()->json(['message' => '認証成功', 'user' => $user], 200);
        } else {
            // 認証に失敗した場合
            return response()->json(['error' => '認証に失敗しました。'], 401);
        }
        
    }
    public function user(Loginuser $loginuser)
    {
        $user = Auth::user(); // 認証されたユーザーを取得
        return response()->json(['message' => '認証成功', 'user' => $user], 200);
    }


    public function new_create_account(Request $request)
    {
        $user = User::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // パスワードをハッシュ化
        ]);
        Auth::login($user);
        return response()->json(['user' => $user], 200);


    }
    public function logout(Request $request)
    {
        // 現在のアクセストークンを削除
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'ログアウトしました。'], 200);
    }

    public function update(Request $request)
    {



    }


    public function delete(Request $request)
    {




    }
}
