<?php

use Api\TmdApi\TmdApi;
use App\Genre;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(TmdApi::genres() as $gener){
            Genre::create($gener);
        }

    }
}
