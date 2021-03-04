<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SystemAdminController extends Controller
{
    //

    public function loadSysAdminPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType("1");
        return view('sys_admin_page', ["user_list" => $user_data]);
    }
    public function loadUniAdminPage()
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType("2");
        return view('uni_admin_page', ["user_list" => $user_data]);
    }
}
