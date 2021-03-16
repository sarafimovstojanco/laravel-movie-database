<?php

use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
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

        $movie = []; 
        foreach($movies as $key=>$arr){
            $movie[] =  $arr['originalTitle'];
        
        DB::table('movies')->insert([
            'name' => $arr['originalTitle'],
        ]);
    }
    }
}
