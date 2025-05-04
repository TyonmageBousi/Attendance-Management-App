<?php

namespace App\UseCases;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class Loginuser
{

    public function login($user)
    {
        $email = $user->email;
        $password = $user->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            if (!$user) {
                return response()->json(['error' => 'ユーザーが見つかりません。'], 404);
            }
        } else {
            return response()->json(['error' => '認証に失敗しました。'], 401);
        }
        // \Log::info('Login Success', ['user' => Auth::user()]);
    }

    public function get_user()
    {
        $user = Auth::user()->only('name', 'user_id', 'profile_picture');

        $posts = User::find(Auth::id())->attendances()->nowMonth()->get();

        foreach ($posts as $post) {
            $clock_in = new \DateTime($post->clock_in);  // グローバルな DateTime クラスを使用
            $clock_out = new \DateTime($post->clock_out);
            $dammy_date = "1970-01-01 "; //ダミー時間
            $break_time = new \DateTime($dammy_date . $post->break_time);
            $overtime = new \DateTime($dammy_date . $post->overtime);
            $work_time = $clock_out->diff($clock_in); //退勤時間―出勤時間
            $work_time_in_minutes = ($work_time->h * 60 + $work_time->i);
            $break_time_in_minutes = ($break_time->format('H') * 60) + $break_time->format('i');  // 分単位に変換
            $overtime_in_minutes = ($overtime->format('H') * 60) + $overtime->format('i');
            $final_work_time_in_minutes = $work_time_in_minutes - $break_time_in_minutes + $overtime_in_minutes;
            $posts['work_time'] = $final_work_time_in_minutes;

            return $posts;

        }

    }
}