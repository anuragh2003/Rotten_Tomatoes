<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Tvshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
   public function index()
{
    $movies = Movie::latest()->take(8)->get();
    $tvshows = TvShow::latest()->take(8)->get();

    $topMovies = Movie::withAvg(['reviews' => function ($q) {
        $q->where('approved', true);
    }], 'rating')
    ->orderByDesc('reviews_avg_rating')
    ->take(4)
    ->get();

    $topTvShows = TvShow::withAvg(['reviews' => function ($q) {
        $q->where('approved', true);
    }], 'rating')
    ->orderByDesc('reviews_avg_rating')
    ->take(4)
    ->get();

    return view('index', compact('movies', 'tvshows', 'topMovies', 'topTvShows'));
}

public function list()
{
    $movies = Movie::all();
    return view('movies', compact('movies'));
}
   public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'age_rating' => 'nullable|string|max:10',
        'duration' => 'nullable|string|max:20',
        'genres' => 'nullable|string',
        'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'trailer_url' => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('poster')) {
        $validated['poster'] = $request->file('poster')->store('posters', 'public');
    }

    $movie = Movie::create($validated);

    return redirect()->route('index')->with('success','Movie Created successfully!');
}

    public function show(Movie $movie)
    {
        $reviews = $movie->reviews()->where('approved', true)->get();
        return view('movies.show', compact('movie', 'reviews'));
}
}
