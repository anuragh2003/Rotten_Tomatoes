<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/signin', function () {
    return view('signin');
});

Route::get("/login",function(){
    return view("login");
})->name('login');


Route::post('/users/login', [UserController::class, 'login'])->name('users.login');

Route::resource('users', UserController::class);
