<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use HasApiTokens;
use Illuminate\Support\Facades\Hash; // ここでHashクラスをインポート

class LoginController extends Controller
{    // リクエストからメールアドレスとパスワードを取得
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
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
        if (is_null($user->where('email', $email)->where('password', $password)->where('name', $name)->first())) {
            echo "既に登録されています";
        }
        $user = Auth::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // パスワードはハッシュ化して保存
        ]);
        return response()->json(['message' => '新規登録完了しました。'], 200);
    }
    public function logout(Request $request)
    {
        // 現在のアクセストークンを削除
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'ログアウトしました。'], 200);
    }
}
