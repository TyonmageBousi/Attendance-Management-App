<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Attendance;
class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'clock_in' => '2025-04-01 09:00:00',
                'clock_out' => '2025-04-01 18:00:00',
                'break_time' => '01:00:00',
                'overtime' => '00:00:00',
                'status' => 1,
            ],
            [
                'user_id' => 1,
                'clock_in' => '2025-04-05 08:30:00',
                'clock_out' => '2025-04-05 17:30:00',
                'break_time' => '01:00:00',
                'overtime' => '00:30:00',
                'status' => 1,
            ],
            [
                'user_id' => 1,
                'clock_in' => '2025-04-10 09:15:00',
                'clock_out' => '2025-04-10 18:15:00',
                'break_time' => '00:45:00',
                'overtime' => '00:15:00',
                'status' => 1,
            ],
            [
                'user_id' => 1,
                'clock_in' => '2025-04-15 09:00:00',
                'clock_out' => '2025-04-15 19:00:00',
                'break_time' => '01:00:00',
                'overtime' => '01:00:00',
                'status' => 1,
            ],
            [
                'user_id' => 1,
                'clock_in' => '2025-04-20 10:00:00',
                'clock_out' => '2025-04-20 18:00:00',
                'break_time' => '00:30:00',
                'overtime' => '00:00:00',
                'status' => 1,
            ],
        ];


        foreach ($data as $attendance) {
            Attendance::create($attendance);
        }

    }
}


