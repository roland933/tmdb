<?php

use Api\TmdApi\TmdApi;
use App\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
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
}
