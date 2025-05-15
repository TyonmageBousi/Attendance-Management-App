<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get  ('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/example', function () {
        return response()->json(['message' => 'Hello World']);

    });
});


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/new_create_account', [AuthController::class, 'new_create_account'])->name('new_create_account');

