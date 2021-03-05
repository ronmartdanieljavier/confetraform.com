<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample', function () {
    return view('sample_page');
});

Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', function () {
    return view('dashboard_page');
})->middleware('auth');
// ALINE
Route::get('/regstudent', function () {
    return view('registerstudent_page');
});

Route::get('/regstaff', "RegisterController@loadRegisterPage");

Route::get('/students', function () {
    return view('students_page');
});

Route::get('/userprofile', "UserProfileController@loadUserProfilePage");

Route::get('/security', function () {
    return view('usersecurity_page');
});

Route::get('/regstaff', function () {
    return view('registerstaff_page');
})->middleware('auth');
Route::get('/students', function () {
    return view('students_page');
})->middleware('auth');
Route::get('/userprofile', function () {
    return view('userprofile_page');
})->middleware('auth');
Route::get('/security', function () {
    return view('usersecurity_page');
})->middleware('auth');

Route::get('/notifications', function () {
    return view('usernotifications_page');
})->middleware('auth');

Route::get('/sys-admins', "SystemAdminController@loadSysAdminPage")->middleware('auth');
Route::get('/uni-admins', "SystemAdminController@loadUniAdminPage")->middleware('auth');
Route::get('/uni-approvers', "UniversityAdminController@loadApproverPage")->middleware('auth');
Route::get('/uni-reviewers', "UniversityAdminController@loadReviewerPage")->middleware('auth');
Route::get('/uni-applicants', "UniversityAdminController@loadApplicantPage")->middleware('auth');
