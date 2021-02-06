<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ApplicationStatusSeeder extends Seeder
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
        $insert_array[] = [ 'status_name' => "For Review"];
        $insert_array[] = [ 'status_name' => "For Approval"];
        $insert_array[] = [ 'status_name' => "Approved"];
        $insert_array[] = [ 'status_name' => "Disapproved"];
        $insert_array[] = [ 'status_name' => "Draft"];

        DB::table('application_status')->insert($insert_array);
    }
}
