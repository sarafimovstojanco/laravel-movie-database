<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $guarded = ['actors'];

    public function watchable()
    {
        return $this->morphTo();
    }
    
} 
