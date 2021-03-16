<?php

namespace App\Http\Controllers;

use File;
use Storage;
use App\Actor;


class ActorsController extends Controller
{
    public function index()
    {
        $movies = Storage::disk('local')->get('movies.json');
        $movies = json_decode($movies, true);

        $actors = []; 
        foreach($movies as $key=>$arr){
            $actors[] =  $arr['actors'];
            $movie_names[] =  $arr['originalTitle'];
        }

        $actor=[];
        foreach($actors as $arr) {
            foreach($arr as $a){
                $actor[] = $a;
            }
        }
        $name=[];
        foreach($actor as $n){
            $name[] = $n;
        }
        return $name;
    }
}
