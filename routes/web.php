<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');


});


Route::get('/test', [LoginController ::class, 'index'])->name('test');

Route::post('/login', [LoginController ::class, 'login'])->name('login');