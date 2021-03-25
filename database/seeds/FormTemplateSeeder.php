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
        for($x=1; $x<=10; $x++) {
            DB::table('form_templates')->insert([
                'form_name' => "Postgraduate Research Student Conference Funding ".$x,
                'form_description' => "2020 Form for Students of Higher Degree by Research ".$x,
                'university_id' => "1",
                'form_status_id' => "1",
                'created_by' => "1",
                'updated_by' => "1"
            ]);
        }
    }
}
