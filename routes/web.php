<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;


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
Route::post('/new_create_account', [CreateController::class, 'new_create_account'])->name('new_create_account');
Route::post('/update', [UpdateController::class, 'update'])->name('update');

