<?php

use Illuminate\Database\Seeder;



class ActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
        DB::table('actors')->insert([
            'name' => $name,
        ]);
    }

    }
}
