<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{

    public function loadUserProfilePage(Request $request)
    {
        $user_id = $request->input("id");
        $user_data = DB::table("users")->where("users.id", Auth::user()->id);
        $user_data = $user_data
            ->leftJoin('courses', 'courses.id', '=', 'users.course_id')
            ->leftJoin('department', 'department.id', '=', 'users.department_id')
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
            "course_name" => $user_data->course_name,
            "department_name" => $user_data->department_name
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
    public function loadUserPage($user_id)
    {
        $user_data = DB::table("users")->where("users.id", $user_id);
        $user_data = $user_data
            ->leftJoin('courses', 'courses.id', '=', 'users.course_id')
            ->leftJoin('department', 'department.id', '=', 'users.department_id')
            ->first();
        //var_dump($user_data);
//        dd($user_data);

        $current_user = [
            "user_id" => $user_id,
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
            "course_name" => $user_data->course_name,
            "department_id" => $user_data->department_id,
            "department_name" => $user_data->department_name
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
        $department_data = DB::table("department")
            ->get();
        $department_list = [];
        foreach($department_data as $row_data) {
            $department_list[] = [
                "department_id" => $row_data->id,
                "department_name" => $row_data->department_name
            ];
        }
//        dd($course_list);
        if(Auth::user()->user_type_id == 2) {
            return view('user_page', ["var_for_course" => $course_list,"var_for_department" => $department_list, "var_for_user" => $current_user]);
        } else {
            return Redirect::back();
        }
    }

    public function saveProfile(Request $request)
    {
//        dd($request->all());
        if(Hash::check($request->input("current_password"), Auth::user()->getAuthPassword())) {
            $student_number = $request->input("student_number");
            $fist_name = $request->input("fist_name");
            $last_name = $request->input("last_name");
            $street = $request->input("street");
            $suburb = $request->input("suburb");
            $post_code = $request->input("post_code");
            $state = $request->input("state");
            $contact_number = $request->input("contact_number");
            $date_of_birth = $request->input("date_of_birth");
            $current_password = $request->input("current_password");
            $new_password = $request->input("new_password");

            $validator = Validator::make($request->all(), [
                'street' => 'required|max:255',
                'suburb' => 'required|max:255',
                'post_code' => 'required|max:255',
                'state' => 'required|max:255',
                'contact_number' => 'required|max:255',
                'new_password' => 'max:255',
                'new_confirm_password' => 'same:new_password'
            ]);

            if ($validator->fails()) {
                return redirect('/userprofile')
                    ->withErrors($validator)
                    ->withInput();
            }
            $user_model_holder = new User();
            $update_array = [
                "contact_number" => $contact_number,
                "street" => $street,
                "suburb" => $suburb,
                "state" => $state,
                "post_code" => $post_code,
                "status" => 1,
            ];
            $user_model_holder->updateAuthUser($update_array);
            if($new_password) {
                $update_array = [
                    "password" => Hash::make($new_password),
                ];
                $user_model_holder->updateAuthUser($update_array);
            }
            return Redirect::back();
        } else {
            $validator = [""=>"Password provided is incorrect"];
            return redirect('/userprofile')
                ->withErrors($validator)
                ->withInput();
        }

    }
    public function saveUser(Request $request)
    {
        $user_id = $request->input("user_id");

        if(Auth::user()->user_type_id == 2) {

            $student_number = $request->input("student_number");
            $fist_name = $request->input("first_name");
            $last_name = $request->input("last_name");
            $street = $request->input("street");
            $email = $request->input("email");
            $suburb = $request->input("suburb");
            $post_code = $request->input("post_code");
            $state = $request->input("state");
            $contact_number = $request->input("contact_number");
            $date_of_birth = $request->input("date_of_birth");
            $new_password = $request->input("new_password");

            $validator = Validator::make($request->all(), [
                'user_id' => 'required|max:255',
                'student_number' => 'required|max:255',
                'email' => 'required|email',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'date_of_birth' => 'required|max:255',
                'street' => 'required|max:255',
                'suburb' => 'required|max:255',
                'post_code' => 'required|max:255',
                'state' => 'required|max:255',
                'contact_number' => 'required|max:255',
                'new_password' => 'max:255',
                'new_confirm_password' => 'same:new_password'
            ]);

            if ($validator->fails()) {
                return redirect('/view-user/'.$user_id)
                    ->withErrors($validator)
                    ->withInput();
            }
            $user_model_holder = new User();
            $update_array = [
                "student_number" => $student_number,
                "email" => $email,
                "first_name" => $fist_name,
                "last_name" => $last_name,
                "date_of_birth" => $date_of_birth,
                "contact_number" => $contact_number,
                "street" => $street,
                "suburb" => $suburb,
                "state" => $state,
                "post_code" => $post_code,
                "status" => 1,
            ];
            $user_model_holder->updateUser($user_id,$update_array);
            if($new_password) {
                $update_array = [
                    "password" => Hash::make($new_password),
                ];
                $user_model_holder->updateUser($user_id, $update_array);
            }
            return Redirect::back();
        } else {
            $validator = [""=>"Password provided is incorrect"];
            return redirect('/view-user/'.$user_id)
                ->withErrors($validator)
                ->withInput();
        }

    }
}
