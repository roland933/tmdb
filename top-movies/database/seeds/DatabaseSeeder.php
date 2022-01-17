<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                GenresSeeder::class,
                MovieSeeder::class,
                CastSeeder::class,
                GenerMovieSeeder::class
        ]);
    }
}
