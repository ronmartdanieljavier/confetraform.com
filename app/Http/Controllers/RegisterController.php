<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function loadRegisterPage()
    {
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

        return view('registerstaff_page', ["var_for_unilist" => $university_list]);
    }
}
