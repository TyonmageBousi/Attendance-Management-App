<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function delete()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'ユーザーが見つかりませんでした。');
        }
        $user->delete();
        return response()->json(['message' => '削除完了']);
    }
}
