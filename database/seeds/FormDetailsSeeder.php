<?php

use Illuminate\Database\Seeder;

class FormDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x=1; $x<=4; $x++) {
            $getId = DB::table('form_section')->insertGetId([
                'form_id' => $x,
                'form_section' => "Conference Details",
                'form_section_order' => 1
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "ConferenceTitle",
                'field_label' => "Conference Title",
                'field_type' => "TEXT",
                'field_value' => "",
                'field_order' => 1,
                'field_required' => true,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "Location",
                'field_label' => "Location",
                'field_type' => "TEXT",
                'field_value' => "",
                'field_order' => 2,
                'field_required' => true,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "StartDate",
                'field_label' => "Start Date",
                'field_type' => "DATE",
                'field_value' => "",
                'field_order' => 3,
                'field_required' => true,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "EndDate",
                'field_label' => "End Date",
                'field_type' => "DATE",
                'field_value' => "",
                'field_order' => 4,
                'field_required' => true,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "Coordinator",
                'field_label' => "Coordinator",
                'field_type' => "TEXT",
                'field_value' => "",
                'field_order' => 5,
                'field_required' => true,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "CoordinatorContactEmail",
                'field_label' => "Coordinator Contact Email",
                'field_type' => "EMAIL",
                'field_value' => "",
                'field_order' => 6,
                'field_required' => false,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "ReportSummary",
                'field_label' => "Report Summary",
                'field_type' => "TEXTAREA",
                'field_value' => "",
                'field_order' => 7,
                'field_required' => false,
            ]);

            $getId = DB::table('form_section')->insertGetId([
                'form_id' => $x,
                'form_section' => "Attachments",
                'form_section_order' => 2
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "attach1",
                'field_label' => "Student's statement of relevance of attending the conference",
                'field_type' => "FILE",
                'field_value' => "",
                'field_order' => 1,
                'field_required' => true,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "attach2",
                'field_label' => "Evidence of peer review by a conference member",
                'field_type' => "FILE",
                'field_value' => "",
                'field_order' => 2,
                'field_required' => true,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "attach3",
                'field_label' => "Acceptance/invitation form the organizers",
                'field_type' => "FILE",
                'field_value' => "",
                'field_order' => 3,
                'field_required' => true,
            ]);
            DB::table('form_details')->insert([
                'form_section_id' => $getId,
                'field_name' => "attach4",
                'field_label' => "Endorsement letter from the supervisor supporting the importance of the conference to the student's work",
                'field_type' => "FILE",
                'field_value' => "",
                'field_order' => 4,
                'field_required' => true,
            ]);

        }
    }
}
