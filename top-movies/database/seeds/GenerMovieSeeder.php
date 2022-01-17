<?php

use Api\TmdApi\TmdApi;
use App\Movie;
use Illuminate\Database\Seeder;

class GenerMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        foreach($data as $ids) {
            $mv = new Movie();
            $mv->genre()->attach([$ids]);
        }
    }
}
