<?php

namespace App\Http\Controllers;

use File;
use Storage;
use DB;
use Illuminate\Support\Arr;
use App\Actor;
use App\Movie;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        foreach($movies as $movie)
        {
            return $movie->actors;
        }
    }

    public function store(Request $request)
    {
        return Actor::firstOrCreate([
            'watchable_type' => $request['type'],
            'watchable_id' => $request['id'],
            'name' => $request['actor'],
            ]);
    }
   
}
