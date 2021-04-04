<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'imdbRating',
        'year'
    ];

    public function actors()
    {
        return $this->morphMany(Actor::class, 'watchable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
