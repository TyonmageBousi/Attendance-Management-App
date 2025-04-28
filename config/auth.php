<?php



return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),  // デフォルトのガード
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users', // ユーザーをどのプロバイダから取得するかを指定
        ],

        'api' => [
            'driver' => 'sanctum',  // APIガードにはSanctumを使う
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',  // Eloquentを使ってユーザーを取得
            'model' => App\Models\User::class, // ユーザーのモデルを指定
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800), // パスワード確認のタイムアウト時間

];

