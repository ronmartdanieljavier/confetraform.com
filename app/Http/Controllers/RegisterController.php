<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public function inviteApprover(Request $request)
    {
        $request->validate([
            'email'          => 'required|email|unique:users',
            'first_name'        => 'required',
            'last_name'  => 'required',
            'date_of_birth'        => 'required',
            'student_number'        => 'required',
            'department_id'        => 'required'
        ]);
        event(new Registered($user = $this->createApprover([
            'email'          => $request->email,
            'first_name'          => $request->first_name,
            'last_name'         => $request->last_name,
            'date_of_birth'       => $request->date_of_birth,
            'student_number' => $request->student_number,
            'department_id'       => $request->department_id,
            'user_type_id'       => 3,
            'university_id'       => Auth::user()->university_id,
        ])));

        return response()->json([ 'success'=> 'Form is successfully submitted!']);

    }
    public function inviteApplicant(Request $request)
    {
        $request->validate([
            'email'          => 'required|email|unique:users',
            'first_name'        => 'required',
            'last_name'  => 'required',
            'date_of_birth'        => 'required',
            'student_number'        => 'required',
            'course_id'        => 'required'
        ]);
        event(new Registered($user = $this->createApplicant([
            'email'          => $request->email,
            'first_name'          => $request->first_name,
            'last_name'         => $request->last_name,
            'date_of_birth'       => $request->date_of_birth,
            'student_number' => $request->student_number,
            'course_id'       => $request->course_id,
            'user_type_id'       => 4,
            'university_id'       => Auth::user()->university_id,
        ])));

        return response()->json([ 'success'=> 'Form is successfully submitted!']);

    }
    public function inviteUniAdmin(Request $request)
    {
        $request->validate([
            'email'          => 'required|email|unique:users',
            'first_name'        => 'required',
            'last_name'  => 'required',
            'date_of_birth'        => 'required',
            'student_number'        => 'required',
            'university_id'        => 'required'
        ]);
        event(new Registered($user = $this->createUniAdmin([
            'email'          => $request->email,
            'first_name'          => $request->first_name,
            'last_name'         => $request->last_name,
            'date_of_birth'       => $request->date_of_birth,
            'student_number' => $request->student_number,
            'university_id'       => $request->university_id,
            'user_type_id'       => 2,
        ])));

        return response()->json([ 'success'=> 'Form is successfully submitted!']);

    }
    protected function createApprover(array $data)
    {
        $password = str_replace("/", "",$data['date_of_birth']);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'date_of_birth' => Carbon::createFromFormat('d/m/Y', $data['date_of_birth'])->format('Y-m-d'),
            'student_number' => $data['student_number'],
            'password' => Hash::make($password),
            'status' => "1",
            'user_type_id' => $data['user_type_id'],
            'university_id' => $data['university_id'],
            'department_id' => $data['department_id'],
        ]);
        $user->sendEmailVerificationNotification();
        return $user;
    }
    protected function createApplicant(array $data)
    {
        $password = str_replace("/", "",$data['date_of_birth']);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'date_of_birth' => Carbon::createFromFormat('d/m/Y', $data['date_of_birth'])->format('Y-m-d'),
            'student_number' => $data['student_number'],
            'password' => Hash::make($password),
            'status' => "1",
            'user_type_id' => $data['user_type_id'],
            'university_id' => $data['university_id'],
            'course_id' => $data['course_id'],
        ]);
        $user->sendEmailVerificationNotification();
        return $user;
    }
    protected function createUniAdmin(array $data)
    {
        $password = str_replace("/", "",$data['date_of_birth']);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'date_of_birth' => Carbon::createFromFormat('d/m/Y', $data['date_of_birth'])->format('Y-m-d'),
            'student_number' => $data['student_number'],
            'password' => Hash::make($password),
            'status' => "1",
            'user_type_id' => $data['user_type_id'],
            'university_id' => $data['university_id']
        ]);
        $user->sendEmailVerificationNotification();
        return $user;
    }
}
