<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');


});


Route::get('/test', [LoginController ::class, 'index'])->name('test');

Route::post('/login', [LoginController ::class, 'login'])->name('login');

Route::get('/new_login', [LoginController ::class, 'new_login'])->name('new_login');

Route::get('/new_create_account', [LoginController ::class, 'new_create_account'])->name('new_create_account');