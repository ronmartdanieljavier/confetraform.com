<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UniversityAdminController extends Controller
{
    //
    public function loadApproverPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType("3");
        return view('approver_page', ["user_list" => $user_data]);
    }
    public function loadReviewerPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType("4");
        return view('reviewer_page', ["user_list" => $user_data]);
    }
    public function loadApplicantPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType("5");
        return view('applicant_page', ["user_list" => $user_data]);
    }
}
