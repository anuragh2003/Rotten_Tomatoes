<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tvshow;
use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class TvshowController extends Controller
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
        $tvshows = Tvshow::all();
        return view('index', compact('tvshows'));
    }

    public function list()
{
    $tvshows = Tvshow::all();
    return view('tvshows', compact('tvshows'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'season'  => 'nullable|string|max:50',
            'year'    => 'nullable|integer',
            'genres'  => 'nullable|string',
            'poster'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'trailer_url' => 'nullable|string|max:255',
        ]);

        $uploadedFile = $request->file('poster');
        $uploadResult = $this->uploadApi->upload($uploadedFile->getRealPath(), [
                'folder' => 'profiles',
                'resource_type' => 'image',
                'transformation' => [
                    ['width' => 300, 'height' => 300, 'crop' => 'fill'],
                ],
            ]);

        $validated['poster'] = $uploadResult['secure_url'];



        $tvshow = Tvshow::create($validated);

        return redirect()->route('index')->with('success','Movie Created successfully!');
    }
     
    public function show(TvShow $tvshow)
    {
    // Fetch only approved reviews for this tv show
    $reviews = $tvshow->reviews()->where('approved', true)->get();

    return view('tvshows.show', compact('tvshow', 'reviews'));
    }


}

