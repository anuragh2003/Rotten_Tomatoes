<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Tvshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class MovieController extends Controller
{
        protected $uploadApi;

    public function __construct()
    {
        // Configure Cloudinary
        Configuration::instance(env('CLOUDINARY_URL'));

        // Instantiate UploadApi
        $this->uploadApi = new UploadApi();
    }
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'age_rating' => 'nullable|string|max:10',
            'duration' => 'nullable|string|max:20',
            'genres' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'trailer_url' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
         $uploadedFile = $request->file('poster');
        $uploadResult = $this->uploadApi->upload($uploadedFile->getRealPath(), [
                'folder' => 'profiles',
                'resource_type' => 'image',
                'transformation' => [
                    ['width' => 300, 'height' => 300, 'crop' => 'fill'],
                ],
            ]);

        $validated = $validator->validated();
        $validated['poster'] = $uploadResult['secure_url'];

        $movie = Movie::create($validated);

        return redirect()->route('index')->with('success','Movie Created successfully!');
    }

    public function show(Movie $movie)
    {
        $reviews = $movie->reviews()->where('approved', true)->get();
        return view('movies.show', compact('movie', 'reviews'));
}
}
