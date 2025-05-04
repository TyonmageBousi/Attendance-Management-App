<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UseCases\LoginUseCase as UseCase;


class LoginController extends Controller
{    // リクエストからメールアドレスとパスワードを取得

    private UseCase $useCase; // ← これを追加
    public function __construct(UseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function login(LoginRequest $request)
    {
        $user = $request->all(); // ここで配列としてデータを受け取ります

        $result = $this->useCase->login($user);

        if ($result === 'error1') {
            return response()->json(['error' => 'ユーザーが見つかりません。'], 404);
        }
        return response()->json(['message' => '認証成功'], 200);
    }

    public function user()
    {
        $posts = $this->useCase->get_user();
        return response()->json(['message' => '認証成功', 'user' => $posts], 200);
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
