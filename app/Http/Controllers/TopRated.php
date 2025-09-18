<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\user_review;
use App\Models\Tvshow;

class TopRated extends Controller
{
     public function index()
    {
        // Fetch movies and tv shows ordered by average rating
        $movies = Movie::withAvg(['reviews' => function ($q) {
            $q->where('approved', true);
        }], 'rating')
        ->orderByDesc('reviews_avg_rating')
        ->take(10) // top 10
        ->get();

        $tvshows = TvShow::withAvg(['reviews' => function ($q) {
            $q->where('approved', true);
        }], 'rating')
        ->orderByDesc('reviews_avg_rating')
        ->take(10)
        ->get();

        return view('top-rated', compact('movies', 'tvshows'));
    }
}
