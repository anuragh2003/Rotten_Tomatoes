<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\user_review;
use App\Models\Tvshow;

class UserReviewController extends Controller
{
    public function store(Request $request, Movie $movie)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'status' => 'required|in:Fresh,Rotten',
        'body'   => 'nullable|string|max:1000',
    ]);

    $movie->reviews()->create([
        'user_id' => Auth::id(),
        'reviewable_id'  => $movie->id,
        'reviewable_type'=> Movie::class,
        'rating' => $request->rating,
        'status' => $request->status,
        'body' => $request->body,
    'approved' => false, // new reviews need admin approval
    ]);

    return back()->with('success', 'Your review has been submitted and is awaiting admin approval.');
}

    public function storeTvShow(Request $request, Tvshow $tvshow)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:Fresh,Rotten',
            'body'   => 'nullable|string|max:1000',
        ]);

        $tvshow->reviews()->create([
            'user_id' => Auth::id(),
            'reviewable_id'  => $tvshow->id,
            'reviewable_type'=> TvShow::class,
            'rating' => $request->rating,
            'status' => $request->status,
            'body' => $request->body,
            'approved' => false,
        ]);

        return back()->with('success', 'Your review has been submitted and is awaiting admin approval.');
    }

public function approve(user_review $review)
{ 
    if (Auth::user()->email !== 'Anuragh@gmail.com') {
        abort(403, 'Unauthorized action.');
    }
    $review->update(['approved' => true]);
    return back()->with('success', 'Review approved successfully!');
}

public function reject(user_review $review)
{
    if (Auth::user()->email !== 'Anuragh@gmail.com') {
        abort(403, 'Unauthorized action.');
    }
    $review->delete(); // or set a rejected flag if you want
    return back()->with('success', 'Review rejected!');
}


}
