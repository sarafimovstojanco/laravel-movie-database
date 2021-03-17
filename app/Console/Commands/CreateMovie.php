<?php

namespace App\Console\Commands;

use App\Movie;
use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateMovie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add the movies in the movies table';

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

        // $movie = [];
        // foreach($movies as $arr){
        //     $movie[] =  $arr;
        //     foreach ($movie as $name) {
        //         Movie::firstOrCreate(["name" => $name]);
        //       }

        // }
        foreach($movies as $arr){
            Movie::firstOrCreate([
                 "title" => $arr['originalTitle'],
                 "imdbRating" => $arr['imdbRating'],
                 "year" => $arr['year']
                 ]);

     }
        // foreach($movies as $arr){
        //     $movie[] =  $arr;
        //     foreach ($movie as $mov) {
        //         Movie::firstOrCreate([
        //             "Title" => $mov['originalTitle'],
        //             "IMDB Rating" => $mov['imdbRating'],
        //             "Year" => $mov['year']
        //             ]);
        //       }

        // }
    $this->info('Movies created successfully !!!');
    }
}