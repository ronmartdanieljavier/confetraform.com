<?php

namespace App\Http\Controllers;

use App\Model\CourseModel;
use App\Model\DepartmentModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniversityAdminController extends Controller
{
    //
    public function loadApproverPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType(Auth::user()->university_id,"3");

        $department_model = new DepartmentModel();
        $department_list = $department_model->loadDepartment();
        return view('approver_page', ["user_list" => $user_data, "department_list" => $department_list]);
    }
    public function loadReviewerPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType(Auth::user()->university_id,"4");
        return view('reviewer_page', ["user_list" => $user_data]);
    }
    public function loadApplicantPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType(Auth::user()->university_id,"5");
        $department_model = new CourseModel();
        $course_list = $department_model->loadCourseList();
        return view('applicant_page', ["user_list" => $user_data, "course_list" => $course_list]);
    }
}
