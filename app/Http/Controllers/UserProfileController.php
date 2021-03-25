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
            ->first();
        //var_dump($user_data);
//        dd($user_data);

        $current_user = [
            "first_name" => $user_data->first_name,
            "last_name" => $user_data->last_name,
            "email" => $user_data->email,
            "date_of_birth" => $user_data->date_of_birth,
            "contact_number" => $user_data->contact_number,
            "student_number" => $user_data->student_number,
            "street" => $user_data->street,// + $row_data->suburb + $row_data->state + $row_data->post_code
            "suburb" => $user_data->suburb,// + $row_data->suburb + $row_data->state + $row_data->post_code
            "state" => $user_data->state,// + $row_data->suburb + $row_data->state + $row_data->post_code
            "post_code" => $user_data->post_code,// + $row_data->suburb + $row_data->state + $row_data->post_code
            "country" => $user_data->country,// + $row_data->suburb + $row_data->state + $row_data->post_code
            "course_id" => $user_data->course_id,
            "course_name" => $user_data->course_name
        ];

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
