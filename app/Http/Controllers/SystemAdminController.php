<?php

namespace App\Http\Controllers;

use App\Model\UniversityModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
            $university_model_holder->updateUniversityById($update_array);
        }
        return Redirect::back();
    }
}
