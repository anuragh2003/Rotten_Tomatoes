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
    $movies = Movie::all();
    $tvshows = Tvshow::all();

    return view('index', compact('movies','tvshows'));
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
    ]);

    if ($request->hasFile('poster')) {
        $validated['poster'] = $request->file('poster')->store('posters', 'public');
    }

    $movie = Movie::create($validated);

    return redirect()->route('index')->with('success','Movie Created successfully!');
}
}
