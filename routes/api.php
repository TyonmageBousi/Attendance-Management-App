<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get  ('/user', [LoginController::class, 'user']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/example', function () {
        return response()->json(['message' => 'Hello World']);

    });
});


Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/new_create_account', [LoginController::class, 'new_create_account'])->name('new_create_account');

