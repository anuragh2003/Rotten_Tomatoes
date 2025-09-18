<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\TvshowController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\TopRated;
use App\Models\user_review;
use Illuminate\Support\Facades\Auth;

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/admin', function () {
    // Only allow your admin email
    if (!Auth::check() || Auth::user()->email !== 'Anuragh@gmail.com') {
        return redirect('/')->with('error', 'Unauthorized');
    }

    $pendingReviews = user_review::where('approved', false)
        ->with(['user','reviewable'])
        ->get();

    return view('admin', compact('pendingReviews'));
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

Route::middleware('auth')->group(function () {
    Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
    Route::post('/movies/{movie}/reviews', [UserReviewController::class, 'store'])->name('reviews.store');
    Route::post('/tvshows/{tvshow}/reviews', [UserReviewController::class, 'storeTvShow'])->name('tvshows.reviews.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/reviews/{review}/approve', [UserReviewController::class, 'approve'])->name('reviews.approve');
    Route::post('/reviews/{review}/reject', [UserReviewController::class, 'reject'])->name('reviews.reject');
});

Route::get('/tvshows/{tvshow}', [TvShowController::class, 'show'])->middleware('auth')->name('tvshows.show');
Route::get('/top-rated', [TopRated::class, 'index'])->name('topRated.index');

