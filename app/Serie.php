<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public function actors()
    {
        return $this->morphMany(Actor::class, 'watchable');
    }
}
