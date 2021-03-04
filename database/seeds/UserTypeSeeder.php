<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTypeSeeder extends Seeder
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
        $insert_array[] = [ 'user_type_name' => "Administrator"]; // can add settings to the system [RON and Aline]
        $insert_array[] = [ 'user_type_name' => "University Administrator"]; // can add settings to the system [RON and Aline]
        $insert_array[] = [ 'user_type_name' => "Approver"]; // can view and approve applications and add reviewer account
        $insert_array[] = [ 'user_type_name' => "Reviewer"]; // can review the applications and assigned it to approver
        $insert_array[] = [ 'user_type_name' => "Applicant"]; // can submit application

        DB::table('user_types')->insert($insert_array);
    }
}
