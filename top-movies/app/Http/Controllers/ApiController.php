<?php

namespace App\Http\Controllers;

use Api\TmdApi\TmdApi;

class ApiController
{
    public function casts() {
        return TmdApi::casts();
    }

    public function movies() {
        return TmdApi::movies();
    }

    public function genres() {
        return TmdApi::genres();
    }

    public function genreMovie() {

        foreach (TmdApi::movies() as $movie) {
            foreach ($movie["results"] as $result) {
                foreach($result["genre_ids"] as $genre) {
                    $data[] = [
                        "movie_id" => $result["id"],
                        "genre_id" => $genre
                    ];
                }
            }
        }
        return $data;

    }

}
