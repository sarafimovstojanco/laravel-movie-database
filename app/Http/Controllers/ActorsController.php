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
        $movies = Storage::disk('local')->get('movies.json');
        $movies = json_decode($movies, true);

       
        // $actor=[];
        // $ac=[];
        // foreach($movies as $mov){
        //  foreach($mov['actors'] as $a){
        //     if(in_array($a, $mov['actors'])){
        //         $actor[] = [
        //             'actor' => $a,
        //             'movie' => $mov['originalTitle']
        //             ];
        //         }
        //     }
        // }

    
                
        // foreach($actor as $a){
        //     foreach($actor as $b){
        //         if($a['actor'] == $b['actor']){
        //             while($a['movie'] !== $b['movie']){
        //                 $ac[]=[
        //                     'actor' => $a['actor'],
        //                     'movie' => $a['movie'] . ", " . $b['movie']
        //                 ];
        //             }
        //         }
        //     }
        // }
        // return $ac;
        $m=[];
        foreach($movies as $arr){
               $m[] = Movie::firstOrCreate([
                    "Title" => $arr['originalTitle'],
                    "IMDB Rating" => $arr['imdbRating'],
                    "Year" => $arr['year']
                    ]);

        }
        return $m;
        //$sorted = $mc->sortBy('actor');
      
       
        // $me = [];
        // foreach($m as $movie){
        //     if($movie['name'] == "The Godfather"){
        //         ret
        //     }
        // }
        // return $m;


         // $actors = []; 
        // foreach($movies as $key=>$arr){
        //     $actors[] =  $arr['actors'];
        //     $movie_names[] =  $arr['originalTitle'];
        //     $actor=[];
        //     foreach($actors as $arr) {
        //         foreach($arr as $a){
        //             $actor[] = $a;
        //         }
               
        //     }
        // }
        // $actor = array_unique($actor);
        // $name=[];
        //$actors=Actor::all();
        // foreach ($movies as $key=>$movie) {
        //     foreach($actors as $actor){
        //          if(Arr::exists($movie, $actor['name'])){
        //              return $movie;
        //          }
        //     }
        // }

        // if(Actor::exists($movies, 'Tim Robbins')){
        //     return 'da';
        // }
            // Actor::firstOrCreate([
            //     "name" => $name,
            //     "watchable_type" => 'movies',
            //     "watchable_id" => '1',
            //     ]);
          //}
        // if(Actor::where('name', 'Morgan Freeman' )->exists()){
        //     return "exists";
        //    }
        //    return "dont exist";
        // $movies = Storage::disk('local')->get('movies.json');
        // $movies = json_decode($movies, true);

        // $actors = []; 
        // foreach($movies as $key=>$arr){
        //     $actors[] =  $arr['actors'];
        //     $movie_names[] =  $arr['originalTitle'];
        // }

        // $actor=[];
        // foreach($actors as $arr) {
        //     foreach($arr as $a){
        //         $actor[] = $a;
        //     }
        // }
        // $name=[];
        // foreach($actor as $n){
        //     $name[] = $n;
        // }
        // return $name;
    }
}
