<?php

use Illuminate\Database\Seeder;

class FormTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert_array = [];

        for($x = 1; $x <= 4; $x++) {
            $insert_array[] = ['form_name' => 'Postgraduate Research Student Conference Funding ', 'form_description' => '2020 Form for Students of Higher Degree by Research ', 'university_id' => $x, 'form_status_id' => '1', 'created_by' => '1', 'updated_by' => '1'];
            $insert_array[] = ['form_name' => '2021 Conference Travel Scholarship - Science', 'form_description' => 'Eligibility Form for Postgraduate Students', 'university_id' => $x, 'form_status_id' => '1', 'created_by' => '1', 'updated_by' => '1'];
            $insert_array[] = ['form_name' => '2021 Conference Travel Scholarship - Humanities and Social Sciences', 'form_description' => 'Eligibility Form for Postgraduate Students', 'university_id' => $x, 'form_status_id' => '1', 'created_by' => '1', 'updated_by' => '1'];
            $insert_array[] = ['form_name' => '2021 Conference Travel Scholarship - Engineering', 'form_description' => 'Eligibility Form for Postgraduate Students', 'university_id' => $x, 'form_status_id' => '1', 'created_by' => '1', 'updated_by' => '1'];
            $insert_array[] = ['form_name' => '2021 Conference Travel Scholarship - Commerce', 'form_description' => 'Eligibility Form for Postgraduate Students', 'university_id' => $x, 'form_status_id' => '1', 'created_by' => '1', 'updated_by' => '1'];
            $insert_array[] = ['form_name' => '2021 Conference Travel Scholarship - Business and Management', 'form_description' => 'Eligibility Form for Postgraduate Students', 'university_id' => $x, 'form_status_id' => '1', 'created_by' => '1', 'updated_by' => '1'];
            $insert_array[] = ['form_name' => '2021 Conference Travel Scholarship - Law', 'form_description' => 'Eligibility Form for Postgraduate Students', 'university_id' => $x, 'form_status_id' => '1', 'created_by' => '1', 'updated_by' => '1'];
            $insert_array[] = ['form_name' => '2021 Conference Travel Scholarship - Medicine', 'form_description' => 'Eligibility Form for Postgraduate Students', 'university_id' => $x, 'form_status_id' => '1', 'created_by' => '1', 'updated_by' => '1'];
        }

        DB::table('form_templates')->insert($insert_array);


//        $get_id = DB::table('applications')->insertGetId([
//            'form_name' => 'Postgraduate Research Student Conference Funding ',
//            'form_description' => '2020 Form for Students of Higher Degree by Research ',
//            'application_status_id' => '1',
//            'created_by' => '4'
//        ]);
//        DB::table('applications_details')->insert([
//            'application_section_id' => $get_id,
//            'field_name' => 'ConferenceTitle',
//            'field_label' => 'Conference Title',
//            'field_type' => 'TEXT',
//            'field_value' => '',
//            'field_order' => 1,
//        ]);
    }
}
