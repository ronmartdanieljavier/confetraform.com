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

Route::get('/home', function () {
    return view('dashboard_page');
});
// ALINE
Route::get('/regstudent', function () {
    return view('registerstudent_page');
});
Route::get('/regstaff', function () {
    return view('registerstaff_page');
});
Route::get('/students', function () {
    return view('students_page');
});
Route::get('/userprofile', function () {
    return view('userprofile_page');
});
Route::get('/security', function () {
    return view('usersecurity_page');
});
Route::get('/notifications', function () {
    return view('usernotifications_page');
});

Route::get('/sys-admins', "SystemAdminController@loadSysAdminPage");
Route::get('/uni-admins', "SystemAdminController@loadUniAdminPage");
Route::get('/uni-approvers', "UniversityAdminController@loadApproverPage");
Route::get('/uni-reviewers', "UniversityAdminController@loadReviewerPage");
Route::get('/uni-applicants', "UniversityAdminController@loadApplicantPage");
