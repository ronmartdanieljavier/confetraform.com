<?php

namespace App\Http\Controllers;

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
        return view('approver_page', ["user_list" => $user_data]);
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
        return view('applicant_page', ["user_list" => $user_data]);
    }
}
