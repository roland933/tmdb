<?php

namespace Api\TmdApi;

use App\Cast;
use App\Genre;
use App\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TmdApi
{

    public static function casts($numberOfCast = 11)
    {

        for ($i = 1; $i < $numberOfCast; $i++) {
            $casts[] = Http::get("https://api.themoviedb.org/3/person/$i?api_key=" . env('API_KEY') . "&language=en-US")->json();
        }
        return $casts;
    }

    public static function movies($numberOfMovie = 11, $type = 'top_rated')
    {

        for ($i = 1; $i < $numberOfMovie; $i++) {
            $movies[] = Http::get("https://api.themoviedb.org/3/movie/" . $type . "?api_key=" . env('API_KEY') . "&language=en-US
                                    &sort_by=vote_average.asc&page=$i")->json();
        }
        return $movies;
    }

    public static function genres()
    {

        $getGeners = Http::get("https://api.themoviedb.org/3/genre/movie/list?api_key=" . env('API_KEY') . "&language=en-US")->json();
        return $getGeners["genres"];

    }

    public static function createMovies()
    {
        foreach (self::movies() as $movie) {
            foreach ($movie["results"] as $result) {
                Movie::create([
                    'id' => $result["id"],
                    'title' => $result["title"],
                    'release_date' => $result["release_date"],
                    'overview' => $result["overview"],
                    'poster_path' => $result["poster_path"],
                    'vote_count' => $result["vote_count"],
                    'vote_average' => $result["vote_average"]
                ]);
            }
        }
    }

    public static function createGenres()
    {
        foreach (self::genres() as $gener) {
            Genre::create($gener);
        }
    }

    public static function createGenreMovie()
    {
        foreach (self::movies() as $movie) {
            foreach ($movie["results"] as $result) {
                foreach ($result["genre_ids"] as $genre) {
                    $data[] = [
                        "genre_id" => $genre,
                        "movie_id" => $result["id"],

                    ];
                }
            }
        }

        foreach ($data as $ids) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table("genre_movie")->insert($ids);

        }

    }

    public static function createCasts() {

        foreach(self::casts() as $cast) {
            if(empty($cast["name"])) continue;
            Cast::create([
                "name" => $cast["name"],
                "imdb_id" => $cast["imdb_id"],
                "biography" => $cast["biography"],
                "date_of_birth" => $cast["birthday"]
            ]);
        }

    }

}
