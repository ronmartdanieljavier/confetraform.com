<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserProfileController extends Controller
{
    
    public function loadUserProfilePage(Request $request)
    {
        $user_id = $request->input("id");
        $user_data = DB::table("users");
        if($user_id) {
            $user_data = $user_data
                ->where("users.id", $user_id);
        }
        $user_data = $user_data
            ->leftJoin('courses', 'courses.id', '=', 'users.course_id')
            ->get();
        //var_dump($user_data);
        //dd($user_data);

        $current_user = [];
        foreach($user_data as $row_data) {
            $current_user[] = [
                "user_first_name" => $row_data->first_name, 
                "user_last_name" => $row_data->last_name, 
                "user_email" => $row_data->email, 
                "user_dob" => $row_data->data_of_birth, 
                "user_phone_number" => $row_data->contact_number, 
                "user_number" => $row_data->student_number, 
                "user_address" => $row_data->street,// + $row_data->suburb + $row_data->state + $row_data->post_code
                "user_course_id" => $row_data->course_id,
                "course_name" => $row_data->course_name
            ];
        }

        $course_data = DB::table("courses")
            ->get();
            
        $course_list = [];
        foreach($course_data as $row_data) {
            $course_list[] = [
                "course_id" => $row_data->id,
                "course_name" => $row_data->course_name
            ];
        }

        return view('userprofile_page', ["var_for_course" => $course_list, "var_for_user" => $current_user]);
    }
}
