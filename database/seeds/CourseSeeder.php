<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CourseSeeder extends Seeder
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
        $insert_array[] = [ 'university_id' => "1",'course_code' => "MAIT", "course_name" => "Master of Applied Information Technology"];
        $insert_array[] = [ 'university_id' => "1",'course_code' => "MNP", "course_name" => "Master of Nursing Practice"];
        $insert_array[] = [ 'university_id' => "1",'course_code' => "MSM", "course_name" => "Master of Management"];

        DB::table('courses')->insert($insert_array);
    }
}
