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

        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDMATH', 'course_name' => 'PhD in Mathematics'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDPSY', 'course_name' => 'PhD in Psychology'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDENG', 'course_name' => 'PhD in English'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDCOMSCI', 'course_name' => 'PhD in Computer Science Engineering'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDPRODEN', 'course_name' => 'PhD in Production Engineering'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDSTAT', 'course_name' => 'PhD in Statistics'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDLOGSCM', 'course_name' => 'PhD in Logistics and Supply Chain Management'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDMARK', 'course_name' => 'PhD in Marketing'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDLAW', 'course_name' => 'Doctor of Laws'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDMFM', 'course_name' => 'Doctorate of Medicine in Forensic Medicine'];
        $insert_array[] = [ 'university_id' => '3','course_code' => 'PHDMCARD', 'course_name' => 'Doctorate of Medicine in Cardiology'];

        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDEN', 'course_name' => 'PhD in Environmental Science and Engineering'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDZOO', 'course_name' => 'PhD Zoology'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDGEO', 'course_name' => 'PhD Geography'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDCEN', 'course_name' => 'PhD in Civil Engineering'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDACC', 'course_name' => 'PhD in Accountancy'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDBF', 'course_name' => 'PhD in Banking and Finance'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDHRM', 'course_name' => 'PhD in Human Resource Management'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDLAW', 'course_name' => 'PhD in Law'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDMH', 'course_name' => 'Doctorate of Medicine in Homoeopathy'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDRADIO', 'course_name' => 'PhD in Radiology'];
        $insert_array[] = [ 'university_id' => '4','course_code' => 'PHDIMMU', 'course_name' => 'PhD in Immunology'];

        DB::table('courses')->insert($insert_array);
    }
}
