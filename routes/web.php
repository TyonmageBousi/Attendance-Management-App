<?php

use App\Http\Controllers\DeleteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/delete', [DeleteController::class, 'delete'])->name('delete');

});
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/new_create_account', [CreateController::class, 'new_create_account'])->name('new_create_account');
Route::post('/update', [UpdateController::class, 'update'])->name('update');

