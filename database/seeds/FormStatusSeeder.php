<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FormStatusSeeder extends Seeder
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
        $insert_array[] = [ 'status_name' => "Active"];
        $insert_array[] = [ 'status_name' => "Inactive"];
        $insert_array[] = [ 'status_name' => "Archived"];

        DB::table('form_status')->insert($insert_array);
    }
}
