<?php

namespace App\UseCases;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthUseCase
{

    public function login($user)
    {
        $email = $user['email'];
        $password = $user['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            if (!$user) {
                return null;
            }
            // ユーザーが見つかった場合の処理
            return $user;
        }
    }

    public function get_user($data)
    {



        $posts = User::find($data['id'])->attendances()->nowMonth()->get();

        foreach ($posts as $post) {
            $clock_in = new \DateTime($post->clock_in);
            $clock_out = new \DateTime($post->clock_out);
            $dammy_date = "1970-01-01 ";
            $break_time = new \DateTime($dammy_date . $post->break_time);
            $overtime = new \DateTime($dammy_date . $post->overtime);
            $work_time = $clock_out->diff($clock_in);
            $work_time_in_minutes = ($work_time->h * 60 + $work_time->i);
            $break_time_in_minutes = ($break_time->format('H') * 60) + $break_time->format('i');
            $overtime_in_minutes = ($overtime->format('H') * 60) + $overtime->format('i');
            $final_work_time_in_minutes = $work_time_in_minutes - $break_time_in_minutes + $overtime_in_minutes;
            $post->work_time = $final_work_time_in_minutes;
        }
        $post = $final_work_time_in_minutes;
        $data["attendance"] = $post;
        return $data;

    }

}
