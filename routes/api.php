<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\TvshowController;

Route::middleware('throttle:api')->group(function () {
Route::prefix('show')->group(function () {
    Route::get('movies', [MovieController::class, 'index']);
    Route::post('movies', [MovieController::class, 'store']);
    Route::post('Tvshows', [TvshowController::class, 'store']);
    Route::get('Tvshows', [TvshowController::class, 'index']);
});

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('profile', [AuthController::class, 'profile']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
    });
});
});


?>