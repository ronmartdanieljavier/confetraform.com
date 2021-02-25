<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function loadRegisterPage(Request $request)
    {
        $user_id = $request->input("id");

        //$university_data = DB::select('select * from universities');
        $university_data = DB::table("universities")
            ->get();

        $university_list = [];
        foreach($university_data as $row_data) {
            $university_list[] = [
                "university_id" => $row_data->id,
                "university_name" => $row_data->university_name
            ];
        }

        //var_dump($university_data);
        //dd($university_data);

        $user_data = DB::table("users");
        if($user_id) {
            $user_data = $user_data->where("id", $user_id);
        }
        $user_data = $user_data->get();
        //dd($user_data);

        return view('registerstaff_page', ["var_for_dropdown" => $university_list]);
    }
}
