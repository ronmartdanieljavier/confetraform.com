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
        $insert_array[] = [ 'university_name' => "Victoria University", 'university_branch' => "Sydney", 'university_code' => "VUSYDNEY777", "status" => "1"];

        DB::table('universities')->insert($insert_array);
    }
}
