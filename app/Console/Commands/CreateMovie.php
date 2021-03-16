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
    protected $signature = 'command:create-movie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new movie in the movies table';

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

        $movie = []; 
        foreach($movies as $key=>$arr){
            $movie[] =  $arr['originalTitle'];
       if(!Movie::where('name', $arr['originalTitle'])->exists()){
        DB::table('movies')->insert([
            'name' => $arr['originalTitle'],
        ]);
        }
    }
}
}