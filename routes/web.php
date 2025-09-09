<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\TvshowController;

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get("/login",function(){
    return view("login");
})->name('login'); 

Route::get('/movies', [MovieController::class, 'list'])->name('movies');
Route::get('/tvshows', [TvshowController::class, 'list'])->name('tvshows');

Route::get('/', [MovieController::class, 'index'])->name('index');
Route::post('/users/login', [UserController::class, 'login'])->name('users.login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::resource('users', UserController::class);
