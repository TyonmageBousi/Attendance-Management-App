<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', [LoginController::class, 'user']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/update', [LoginController::class, 'update'])->name('update');
    Route::post('/delete', [LoginController::class, 'delete'])->name('delete');
    Route::post('/work', [LoginController::class, 'update'])->name('update');
    Route::post('/example', function () {
        return response()->json(['message' => 'Hello World']);

    });
});


Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/sss', function () {
    return response()->json(['message' => csrf_token()]);
});

Route::post('/new_create_account', [LoginController::class, 'new_create_account'])->name('new_create_account');

