<?php

namespace App\Http\Controllers;

use App\Model\ApplicationDetailModel;
use App\Model\CourseModel;
use App\Model\DepartmentModel;
use App\Model\NotificationModel;
use App\Model\UniversityModel;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SystemAdminController extends Controller
{
    //

    public function loadSysAdminPage()
    {

        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType(null,"1");
        return view('sys_admin_page', ["user_list" => $user_data]);
    }
    public function loadUniAdminPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType(null,"2");
        $university_model_holder = new UniversityModel();
        $university_data = $university_model_holder->loadUniversityList();

        return view('uni_admin_page', ["user_list" => $user_data, "university_list" => $university_data]);
    }
    public function loadBudgetSettingPage()
    {
        if(Auth::user()->user_type_id == 2) {

            $university_model_holder = new UniversityModel();
            $university_data = $university_model_holder->getFirstUniversity();
            if($university_data) {
                $university_id = $university_data->university_id;
                $university_name = $university_data->university_name;
                $university_budget = $university_data->university_budget;
                $university_branch = $university_data->university_branch;
                $return_data = [
                    "university_id" => $university_id,
                    "university_name" => $university_name,
                    "university_budget" => $university_budget,
                    "university_branch" => $university_branch,
                ];

                return view('budget_setting_page', ["university_data" => $return_data]);
            }

        } else {
            return redirect("home");
        }

    }
    public function loadUniversitySettingPage()
    {
        if(Auth::user()->user_type_id == 1) {

            $university_model_holder = new UniversityModel();
            $university_data_holder = $university_model_holder->loadUniversityAllList();

            $university_list = [];
            foreach ($university_data_holder as $row_data) {
                $university_id = $row_data->university_id;
                $university_code = $row_data->university_code;
                $university_name = $row_data->university_name;
                $university_budget = $row_data->university_budget;
                $university_branch = $row_data->university_branch;
                $university_status = $row_data->status;

                $course_model_holder = new CourseModel();
                $course_data_holder = $course_model_holder->loadCourseList();
                $course_list = [];
                foreach ($course_data_holder as $course_data) {
                    $course_list[] = [
                        "course_id" => $course_data->course_id,
                        "course_code" => $course_data->course_code,
                        "course_name" => $course_data->course_name
                    ];
                }

                $university_list[] = [
                    "university_id" => $university_id,
                    "university_code" => $university_code,
                    "university_name" => $university_name,
                    "university_budget" => $university_budget,
                    "university_branch" => $university_branch,
                    "status" => $university_status,
                    "university_course_list" => $course_list,
                ];
            }

            $return_data = [
                "university_list" => $university_list,
            ];
            return view('university_setting_page', $return_data);
        } else {
            return redirect("home");
        }

    }
    public function loadCourseSettingPage()
    {
        if(Auth::user()->user_type_id == 2) {

            $course_model_holder = new CourseModel();
            $course_data_holder = $course_model_holder->loadCourseList();
            $course_list = [];
            foreach ($course_data_holder as $course_data) {
                $course_list[] = [
                    "course_id" => $course_data->course_id,
                    "course_code" => $course_data->course_code,
                    "course_name" => $course_data->course_name,
                    "status" => $course_data->status,
                ];
            }
            $return_data = [
                "course_list" => $course_list,
            ];
            return view('course_setting_page', $return_data);
        } else {
            return redirect("home");
        }

    }
    public function loadDepartmentSettingPage()
    {
        if(Auth::user()->user_type_id == 2) {

            $department_model_holder = new DepartmentModel();
            $department_data_holder = $department_model_holder->loadDepartment();
            $department_list = [];
            foreach ($department_data_holder as $department_data) {
                $department_list[] = [
                    "department_id" => $department_data->department_id,
                    "department_name" => $department_data->department_name
                ];
            }
            $return_data = [
                "department_list" => $department_list,
            ];
            return view('department_setting_page', $return_data);
        } else {
            return redirect("home");
        }

    }

    public function deactivateUser($id)
    {
        $user_model_holder = new User();
        $user_model_detail = $user_model_holder->getFirstUserAccountListById($id);
        if($user_model_detail) {
            if($user_model_detail->user_type_id <> 1 && $user_model_detail->university_id == Auth::user()->university_id) {
                $user_model_holder->where("id", $id)->update([
                    "status" => "0"
                ]);
            }
        }
        return Redirect::back();
    }
    public function activateUser($id)
    {
        $user_model_holder = new User();
        $user_model_detail = $user_model_holder->getFirstUserAccountListById($id);
        if($user_model_detail) {
            if($user_model_detail->user_type_id <> 1 && $user_model_detail->university_id == Auth::user()->university_id) {
                $user_model_holder->where("id", $id)->update([
                    "status" => "1"
                ]);
            }
        }
        return Redirect::back();
    }


    public function saveUniversityBudget(Request $request)
    {
        $request->validate([
            'university_budget'        => 'required|numeric'
        ]);

        if(Auth::user()->user_type_id == 2) {
            $university_model_holder = new UniversityModel();
            $update_array = [
                "university_budget" => $request->input("university_budget")
            ];
            $university_model_holder->updateUniversityByAuthId($update_array);
        }
        return Redirect::back();
    }

    public function addUniversity(Request $request)
    {
        $request->validate([
            'university_code'        => 'required|unique:universities',
            'university_name'        => 'required',
            'university_branch'        => 'required'
        ]);

        $university_model_holder = new UniversityModel();
        $update_array = [
            "university_code" => $request->input("university_code"),
            "university_name" => $request->input("university_name"),
            "university_branch" => $request->input("university_branch"),
            "status" => "1",
            "university_budget" => "0.00",
        ];
        $university_model_holder->createUniversity($update_array);

        return Redirect::back();
    }
    public function updateUniversity(Request $request)
    {
        $request->validate([
            'university_id'        => 'required',
            'university_name'        => 'required',
            'university_branch'        => 'required'
        ]);

        $university_model_holder = new UniversityModel();
        $update_array = [
            "university_name" => $request->input("university_name"),
            "university_branch" => $request->input("university_branch")
        ];
        $university_model_holder->updateUniversityById($request->input("university_id"),$update_array);
        return Redirect::back();
    }
    public function deactivateUniversity($id)
    {
        $user_model_holder = new UniversityModel();
        $user_model_detail = $user_model_holder->getFirstUniversityById($id);
        if($user_model_detail) {
            $user_model_holder->where("id", $id)->update([
                "status" => "0"
            ]);
        }
        return Redirect::back();
    }
    public function activateUniversity($id)
    {
        $user_model_holder = new UniversityModel();
        $user_model_detail = $user_model_holder->getFirstUniversityById($id);
        if($user_model_detail) {
            $user_model_holder->where("id", $id)->update([
                "status" => "1"
            ]);
        }
        return Redirect::back();
    }



    public function addCourse(Request $request)
    {
        $request->validate([
            'course_code'        => 'required|unique:courses',
            'course_name'        => 'required'
        ]);

        $course_model_holder = new CourseModel();
        $update_array = [
            "course_code" => $request->input("course_code"),
            "course_name" => $request->input("course_name"),
            "status" => "1"
        ];
        $course_model_holder->createCourse($update_array);

        return Redirect::back();
    }
    public function updateCourse(Request $request)
    {
        $request->validate([
            'course_id'        => 'required',
            'course_name'        => 'required'
        ]);

        $course_model_holder = new CourseModel();
        $update_array = [
            "course_name" => $request->input("course_name")
        ];
        $course_model_holder->updateCourseById($request->input("course_id"),$update_array);
        return Redirect::back();
    }
    public function deactivateCourse($id)
    {
        $user_model_holder = new CourseModel();
        $user_model_holder->where("id", $id)->update([
            "status" => "0"
        ]);
        return Redirect::back();
    }
    public function activateCourse($id)
    {
        $user_model_holder = new CourseModel();
        $user_model_holder->where("id", $id)->update([
            "status" => "1"
        ]);
        return Redirect::back();
    }

    public function loadNotification()
    {
        $notif_model_holder = new NotificationModel();
        $notif_model_data = $notif_model_holder->loadNotificationList();
        $list = [];
        $total_unread = 0;
        foreach ($notif_model_data as $row_data) {
            $user_id = $row_data->user_id;
            $notification_id = $row_data->notification_id;
            $notification_sign = $row_data->notification_sign;
            $notification_message = $row_data->notification_message;
            $link = $row_data->link;
            $read_flag = $row_data->read_flag;
            $created_date = $row_data->created_date;
            if($read_flag == 0) $total_unread++;
            $list[] = [
                "user_id" => $user_id,
                "notification_id" => $notification_id,
                "notification_sign" => $notification_sign,
                "notification_message" => $notification_message,
                "link" => $link,
                "read_flag" => $read_flag,
                "created_date" => $created_date,
            ];
        }

        return response()->json(["list" => $list,"total_unread"=>$total_unread], 200);
    }

    public function addDepartment(Request $request)
    {
        $request->validate([
            'department_name'        => 'required|unique:department',
        ]);

        $course_model_holder = new DepartmentModel();
        $update_array = [
            "department_name" => $request->input("department_name"),
        ];
        $course_model_holder->createDepartment($update_array);

        return Redirect::back();
    }
    public function updateDepartment(Request $request)
    {
        $request->validate([
            'department_name'        => 'required'
        ]);

        $course_model_holder = new DepartmentModel();
        $update_array = [
            "department_name" => $request->input("department_name")
        ];
        $course_model_holder->updateDepartmentById($request->input("department_id"),$update_array);
        return Redirect::back();
    }
    public function download($id)
    {
        $application_detail_model = new ApplicationDetailModel();
        $data_holder = $application_detail_model->loadDetailById($id);
        return Storage::download($data_holder->field_value);
    }
}
