<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'age_rating', 'duration', 'genres', 'poster',
    ];
}