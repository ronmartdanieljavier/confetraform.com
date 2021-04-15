<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $insert_array = [];
        $insert_array[] = [ 'university_name' => "Victoria University", 'university_branch' => "Sydney", 'university_budget' => 10000, 'university_code' => "VUSYDNEY777", "status" => "1"];
        $insert_array[] = [ 'university_name' => "University of Technology Sydney", 'university_branch' => "Sydney", 'university_budget' => 10000, 'university_code' => "UTSSYDNEY", "status" => "1"];
        $insert_array[] = [ 'university_name' => "UNSW Sydney", 'university_branch' => "Sydney", 'university_budget' => 10000, 'university_code' => "UNSW", "status" => "1"];
        $insert_array[] = [ 'university_name' => "RMIT University", 'university_branch' => "Melbourne", 'university_budget' => 10000, 'university_code' => "RMIT", "status" => "1"];

        DB::table('universities')->insert($insert_array);
    }
}
