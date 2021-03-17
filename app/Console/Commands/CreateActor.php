<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage; 
use App\Actor;
use App\Movie;
use DB;

class CreateActor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-actors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add the actors in the actors table';

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
        $movies = Storage::disk('local')->get('movies.json');
        $movies = json_decode($movies, true);
        $movie = Movie::all();
        foreach($movie as $m){
            foreach($movies as $jsonMovies)
            if($m['title'] == $jsonMovies['originalTitle']){
                foreach($jsonMovies['actors'] as $jsonActors){
                    Actor::firstOrCreate([
                        "name" => $jsonActors,
                        "watchable_type" => 'Movies',
                        "watchable_id" => $m['id'],
                        ]);                        ;
                }
            }
        }

        $this->info('Actors created successfully !!!');
    }
}
