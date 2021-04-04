<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movie;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function watched(Request $request)
    {
        $watched_movie = Movie::find($request->movie_id);

        $watched_movie->users()->sync($request->user_id, false);

        return response($watched_movie);
    }

    public function watched_delete(Request $request)
    {
        $not_watched_movie = Movie::find($request->movie_id);

        $not_watched_movie->users()->detach($request->user_id);

        return response($not_watched_movie);
    }

    public function rating(Request $request)
    {
        $rated_movie = Movie::find($request->movie_id);

        $rated_movie->users()->where('user_id', $request->user_id)->update(['rating' => $request->rating]);
        $rated_movie['rating']=$request->rating;
        
        return response ($rated_movie);

    }
    
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        $user = User::find($id);
        $user->movies;

        return $user;
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->only('first_name', 'last_name', 'email') + [
            'password' => Hash::make(1234),
            'background' => '#2E3B55',
            'color' => 'blue',
            'dark_mode' => false,
        ]);
        return response($user, Response::HTTP_CREATED);
    }

    function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->update($request->only('first_name', 'last_name', 'email', 'background', 'color', 'dark_mode')+[
            'password' => Hash::make($request->password)
        ]);

        return response($user, Response::HTTP_ACCEPTED); 
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
