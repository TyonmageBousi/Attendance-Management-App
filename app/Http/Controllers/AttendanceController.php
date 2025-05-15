<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $now = Carbon::now()->toDateString(); // YYYY-MM-DD形式


        
        $status = 1;

        // もし既存の出勤レコードが見つかった場合
        if ($attendance = Attendance::where('created_at', '>', $now)->where('status', $status)->first()) {
            // 出勤レコードがあれば更新
            $attendance->update([
                'clock_out' => $now,
                'break_time' => NULL,
                'overtime' => NULL,
                'status' => 2,
            ]);
        } else {
            // 出勤レコードが見つからない場合、新しいレコードを作成
            Attendance::create([
                'user_id' => $id,
                'clock_in' => $now,
                'clock_out' => NULL,
                'break_time' => NULL,
                'overtime' => NULL,
                'status' => 1,
            ]);
        }

        return response()->json(['message' => $attendance]);

    }
}
