<?php

namespace App\Console\Commands;

use Api\TmdApi\TmdApi;
use Illuminate\Console\Command;

class createGenreMovie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createGenreMovie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        TmdApi::createGenreMovie();
        echo "Genre movie was created successfully";
    }
}
