<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MovieMeta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:metafetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch meta of movies';

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
        $movies = \App\Models\Movie::whereNull('meta')->take(40)->orderBy('id')->get();
        $movies->each(function($movie){ sleep(1); $movie->getMeta(); });
        return Command::SUCCESS;
    }
}
