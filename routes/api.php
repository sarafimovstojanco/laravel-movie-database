<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('users', 'UserController');
Route::post('users/watched', 'UserController@watched');
Route::post('users/watched_delete', 'UserController@watched_delete');
Route::post('users/rating', 'UserController@rating');
Route::post('movies/get', 'MoviesController@get');
Route::post('movies/filtered', 'MoviesController@filtered');
Route::apiResource('movies', 'MoviesController');
Route::apiResource('actors', 'ActorsController');
Route::post('login', 'AuthController@login');

