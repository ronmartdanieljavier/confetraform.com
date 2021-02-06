<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FieldTypeSeeder extends Seeder
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
        $insert_array[] = [ 'field_type' => "RADIO", "field_name" => "Radio", "field_description" => "Radio buttons"];
        $insert_array[] = [ 'field_type' => "SELECT", "field_name" => "Dropdown", "field_description" => "Dropdown menu"];
        $insert_array[] = [ 'field_type' => "INPUT", "field_name" => "Input", "field_description" => "Single line input"];
        $insert_array[] = [ 'field_type' => "TEXT", "field_name" => "Description", "field_description" => "Multi line input"];
        $insert_array[] = [ 'field_type' => "DATE", "field_name" => "Date Picker", "field_description" => "Date picker"];
        $insert_array[] = [ 'field_type' => "DATETIME", "field_name" => "Date Time Picker", "field_description" => "Date & Time picker"];
        $insert_array[] = [ 'field_type' => "CHECKBOX", "field_name" => "Checkbox", "field_description" => "Checkbox"];
        $insert_array[] = [ 'field_type' => "INTEGER", "field_name" => "Whole Number", "field_description" => "Whole Number"];
        $insert_array[] = [ 'field_type' => "DECIMAL", "field_name" => "Decimal Number", "field_description" => "Decimal Number"];

        DB::table('field_types')->insert($insert_array);
    }
}
