<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    //
    public function loadUserProfilePage()
    {
        $course_data = DB::table("courses")
            ->get();

        $course_list = [];
        foreach($course_data as $row_data) {
            $course_list[] = [
                "course_id" => $row_data->id,
                "course_name" => $row_data->course_name
            ];
        }

        return view('userprofile_page', ["var_for_dropdown" => $course_list]);
    }
}
