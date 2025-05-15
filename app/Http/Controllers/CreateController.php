<?php

namespace App\Http\Controllers;

use App\UseCases\CreateUseCase as UseCase;
use Illuminate\Http\Request;

class CreateController extends Controller
{

    private UseCase $useCase; // ← これを追加
    public function __construct(UseCase $useCase)
    {
        $this->useCase = $useCase;
    }
    public function new_create_account(Request $request)
    {
        $data = $request->all();
        $posts = $this->useCase->index($data);
        return response()->json(['user' => $posts], 200);
    }
}

