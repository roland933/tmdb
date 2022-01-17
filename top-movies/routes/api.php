<?php

use Illuminate\Support\Facades\Route;

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

Route::get('movies', 'ApiController@movies');
Route::get('casts', 'ApiController@casts');
Route::get('genres', 'ApiController@genres');
Route::get('genre_movie', 'ApiController@genreMovie');
Route::get('genre_by_movie_id/{id}', function($id){
    $movie = \App\Movie::findOrFail($id);
    foreach($movie->genre as $genre) {
        $genres[] = $genre;
    }
    return $genres;
});
Route::get('movies/create', 'ApiController@createMovies');
