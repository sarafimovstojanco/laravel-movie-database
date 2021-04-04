<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MoviesController extends Controller
{
    public function get(Request $request)
    {
        if ($request->perPage !== null){
            $movies = Movie::paginate($request->perPage);
            foreach ($movies as $movie){
                foreach($movie->users as $user ){
                    foreach($user as $id){
                     if($id == $request->userId){
                         $movie['watched']= true;
                         $movie['rating']=$movie->users()->where('user_id', $request->userId )->pluck('rating');
                         }
                         else{
                         $movie['watched']= false;
                         $movie['rating']= 0;
                         }
                    }
                    
                 }
                $movie['actors']= $movie->actors;
                $movie['users']= $movie->users->pluck('id');
            }
            return $movies;
        }
        else {
        $movies = Movie::paginate(10);
        $user = User::find($request->userId);
        foreach ($movies as $movie){
            foreach($movie->users as $user ){
               foreach($user as $id){
                if($id == $request->userId){
                    $movie['watched']= true;
                    $movie['rating']=$movie->users()->where('user_id', $request->userId )->pluck('rating');
                    }
                    else{
                    $movie['watched']= false;
                    $movie['rating']= 0;
                    }
               }
               
            }
            $movie['actors']= $movie->actors;
            $movie['users']= $movie->users->pluck('id');
        }

        return $movies;
      }
    }

    public function filtered(Request $request)
    {
        $movies = Movie::all();
        
        $filteredMovies =[];
        foreach($movies as $movie){
            $title = strtolower($movie->title);
            if (str_contains($title, $request->filter)){
                foreach($movie->users as $user ){
                    foreach($user as $id){
                     if($id == $request->userId){
                         $movie['watched']= true;
                         $movie['rating']=$movie->users()->where('user_id', $request->userId )->pluck('rating');
                         
                         }
                         else{
                         $movie['watched']= false;
                         $movie['rating']= 0;
                         }
                    }
                 }
                 $movie['actors']= $movie->actors;
                 $movie['users']= $movie->users->pluck('id');
                 $filteredMovies[] = $movie;
            }
        }
        return $filteredMovies;
    }

    public function index()
    {
        $user = User::first();
        $recent = $user->movies->sortByDesc('id')->take(5);

        return Movie::all();

    }

    public function show($id)
    {
        return Movie::find($id);
    }

    public function store(Request $request)
    {
        return Movie::firstOrCreate([
            "title" => $request['title'],
            "imdbRating" => $request['imdbRating'],
            "year" => $request['year']
            ]);
    }

    public function destroy($id)
    {
        Movie::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
