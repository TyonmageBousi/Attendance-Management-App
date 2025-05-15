<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\UpdateUseCase as UseCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    private UseCase $useCase; // ← これを追加
    public function __construct(UseCase $useCase)
    {
        $this->useCase = $useCase;
    }
    public function index(Request $request)
    {
        $data = $request->only(
            'user_id',
            'name',
            'email',
            'password',
            'profile_picture',
        );

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user = User::findOrFail(Auth::id());
        $user->update($data);
        return response(['post' => $data]);
    }
}
