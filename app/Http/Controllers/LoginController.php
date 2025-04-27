<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash; // ここでHashクラスをインポート

class LoginController extends Controller
{    // リクエストからメールアドレスとパスワードを取得
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        //response()->json(['work_time' => $email], 200);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            if (!$user) {
                return response()->json(['error' => 'ユーザーが見つかりません。'], 404);
            }
XSRF-TOKEN'work_time' => $user], 200);
            $name = $user->name;
            $email = $user->email;

            $profile_picture = $user->profile_picture;
            $posts = User::find($user->id)->attendances()->nowMonth()->get();
          //  response()->json(['work_time' => $posts], 200);

            foreach ($posts as $post) {
                $clock_in = new \DateTime($post->clock_in);  // グローバルな DateTime クラスを使用
                $clock_out = new \DateTime($post->clock_out);
                $dammy_date = "1970-01-01 ";
                $break_time = new \DateTime($dammy_date . $post->break_time);
                $overtime = new \DateTime($dammy_date . $post->overtime);
                $work_time = $clock_out->diff($clock_in); //退勤時間―出勤時間
                $work_time_in_minutes = ($work_time->h * 60 + $work_time->i);
                $break_time_in_minutes = ($break_time->format('H') * 60) + $break_time->format('i');  // 分単位に変換
                $overtime_in_minutes = ($overtime->format('H') * 60) + $overtime->format('i');
                $final_work_time_in_minutes = $work_time_in_minutes - $break_time_in_minutes + $overtime_in_minutes;
                response()->json(['work_time' => $final_work_time_in_minutes], 200);
            }
            ;










            //return response()->json(['posts' => $posts]);



            //return response()->json(['token' => $token]);
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
