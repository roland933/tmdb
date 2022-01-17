<?php

use Api\TmdApi\TmdApi;
use App\Cast;
use Illuminate\Database\Seeder;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(TmdApi::casts() as $cast) {
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
