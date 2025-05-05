<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 外部キー制約を一時的に無効化
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Userテーブルのデータを削除
        User::truncate();
        
        // 外部キー制約を元に戻す
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Base64エンコードした画像を取得
        $base64Image = 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('pictures/tomic.jpg')));

        // Userの作成
        User::create([
            'user_id' => 'tomic0115',
            'name' => 'tomic',
            'email' => 'comekukumi@gmail.com',
            'password' => Hash::make(7777),
            'profile_picture' => $base64Image
        ]);
    }
}
