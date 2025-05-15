<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | This option controls the cross-origin resource sharing settings for your
    | application. You may set the values to match the requirements of your
    | application. By default, all origins are allowed to access the resources.
    |
    */

    'supports_credentials' => true,  // withCredentialsをtrueに設定

    'allowed_origins' => [env('FRONTEND_ORIGIN')],  // 許可するオリジンを指定
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['Accept', 'Content-Type', 'X-XSRF-TOKEN'], // add // 許可するヘッダーを指定（*は全てのヘッダーを許可）
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS', 'PATCH'],  // 許可するHTTPメソッドを指定（*は全てのメソッドを許可）
    'exposed_headers' => [],
    'max_age' => 0,
    'hosts' => [],
    'paths' => [], // ← 修正ポイント


];
