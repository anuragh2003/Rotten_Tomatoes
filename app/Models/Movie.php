<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'age_rating', 'duration', 'genres', 'poster', 'trailer_url'
    ];

    public function reviews()
    {
        return $this->morphMany(user_review::class, 'reviewable');
    }

    public function averageRating()
    {
    return $this->reviews()
        ->where('approved', true) // only approved reviews count
        ->avg('rating');
    }
}