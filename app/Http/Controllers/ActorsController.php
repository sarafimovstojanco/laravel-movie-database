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
        //
    }

    public function store(Request $request)
    {
      return Movie::firstOrCreate([
            "title" => $request['title'],
            "imdbRating" => $request['imdbRating'],
            "year" => $request['year']
            ]);
    }
}
