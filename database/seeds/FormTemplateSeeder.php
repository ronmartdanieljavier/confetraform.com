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
        DB::table('form_templates')->insert([
            'form_name' => "Postgraduate Research Student Conference Funding ",
            'form_description' => "2020 Form for Students of Higher Degree by Research ",
            'university_id' => "1",
            'form_status_id' => "1",
            'created_by' => "1",
            'updated_by' => "1"
        ]);
    }
}
