<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tvshow;
use Illuminate\Http\Request;

class TvshowController extends Controller
{
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
        ]);

        if ($request->hasFile('poster')) {
        $validated['poster'] = $request->file('poster')->store('posters', 'public');
      }


        $tvshow = Tvshow::create($validated);

        return redirect()->route('index')->with('success','Movie Created successfully!');
    }

}

