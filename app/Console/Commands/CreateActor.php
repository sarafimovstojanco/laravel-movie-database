<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage; 
use App\Actor;
use DB;

class CreateActor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-actor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new actor in the actors table';

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

        $actors = []; 
        foreach($movies as $key=>$arr){
            $actors[] =  $arr['actors'];
            $movie_names[] =  $arr['originalTitle'];
            $actor=[];
            foreach($actors as $arr) {
                foreach($arr as $a){
                    $actor[] = $a;
                }
               
            }
        }
        $actor = array_unique($actor);
        $name=[];
        foreach ($actor as $name){
        if(!Actor::where('name', $name )->exists()){
        DB::table('actors')->insert([
            'name' => $name,
        ]);
        }
    }
}
}
