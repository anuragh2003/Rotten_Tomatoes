<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tvshow extends Model
{
    use HasFactory;

    // Table name (optional, only if it's not the plural of the model name)
    protected $table = 'tvshows';

    // Fields allowed for mass assignment
    protected $fillable = [
        'title',
        'season',
        'year',
        'genres',
        'poster',
    ];
}
