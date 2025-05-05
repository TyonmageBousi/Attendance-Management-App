<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\UseCases\LoginUseCase as UseCase;


class AuthController extends Controller
{    

    private UseCase $useCase; 
    public function __construct(UseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function login(LoginRequest $request)
    {
        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {
            return response()->json(['message' => '認証に成功しました。'], 200);
        } else
            return response()->json(['error' => '認証に失敗しました。'], 401);
    }

    public function user()
    {
        $data = Auth::user()->only('id', 'name', 'user_id');
        if (!$data) {
            return response()->json(['message' => 'リダイレクト'], 200);
        }
        $data = $this->useCase->get_user($data);
        return response()->json(['message' => '認証成功', 'user' => $data], 200);
    }
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'ログアウトしました。'], 200);
    }
}
