<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_review extends Model
{
    protected $fillable = [
        'user_id',
        'reviewable_id',
        'reviewable_type',
        'rating',
        'status',
        'body',
        'approved', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviewable()
    {
        return $this->morphTo();
    }
}
