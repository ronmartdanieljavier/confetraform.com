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


// ALINE
Route::get('/regstudent', function () {
    return view('registerstudent_page');
});

Route::get('/regstaff', "RegisterController@loadRegisterPage");

Route::get('/students', function () {
    return view('students_page');
});



Route::get('/security', function () {
    return view('usersecurity_page');
});

Route::get('/regstaff', function () {
    return view('registerstaff_page');
})->middleware('auth');
Route::get('/students', function () {
    return view('students_page');
})->middleware('auth');
Route::get('/security', function () {
    return view('usersecurity_page');
})->middleware('auth');

Route::get('/notifications', function () {
    return view('usernotifications_page');
})->middleware('auth');

Route::get('/sys-admins', "SystemAdminController@loadSysAdminPage")->middleware('auth')->middleware('verified');;
Route::get('/uni-admins', "SystemAdminController@loadUniAdminPage")->middleware('auth')->middleware('verified');;
Route::get('/uni-approvers', "UniversityAdminController@loadApproverPage")->middleware('auth')->middleware('verified');;
Route::get('/uni-reviewers', "UniversityAdminController@loadReviewerPage")->middleware('auth')->middleware('verified');;
Route::get('/uni-applicants', "UniversityAdminController@loadApplicantPage")->middleware('auth')->middleware('verified');;

Route::get('/form-list', "FormController@loadFormListPage")->middleware('auth')->middleware('verified');;
Route::get('/application-list', "ApplicationController@loadApplicationListPage")->middleware('auth')->middleware('verified');;

Route::get('/view-form/{id}', "FormController@loadFormById")->middleware('auth')->middleware('verified');;
Route::get('/apply-form/{id}', "ApplicationController@loadFormById")->middleware('auth')->middleware('verified');;

Route::post('/save-form-template', "FormController@saveFormTemplate")->middleware('auth')->middleware('verified');;
Route::post('/delete-form-template/{id}', "FormController@deleteFormTemplate")->middleware('auth')->middleware('verified');;
Route::post('/save-form-section-detail', "FormController@saveFormDetail")->middleware('auth')->middleware('verified');;
Route::post('/delete-form-detail/{id}', "FormController@deleteFormDetail")->middleware('auth')->middleware('verified');;

Route::post('/save-form-section', "FormController@saveFormSection")->middleware('auth')->middleware('verified');;
Route::post('/delete-form-section', "FormController@deleteFormSection")->middleware('auth')->middleware('verified');;
Route::post('/delete-application/{id}', "ApplicationController@deleteApplication")->middleware('auth')->middleware('verified');;

Route::post('/application-list', "ApplicationController@loadApplicationList")->middleware('auth')->middleware('verified');;

Route::post('/submit-application', "ApplicationController@submitApplication")->middleware('auth')->middleware('verified');;
Route::get('/your-application', "ApplicationController@loadUserApplication")->middleware('auth')->middleware('verified');;
Route::get('/view-application/{id}', "ApplicationController@viewUserApplication")->middleware('auth')->middleware('verified');;

Route::get('/submitted-application-list', "ApplicationController@loadAllSubmittedForm")->middleware('auth')->middleware('verified');;
Route::get('/submitted-application-view/{id}', "ApplicationController@viewSubmittedApplication")->middleware('auth')->middleware('verified');;
Route::get('/compare-application-page', "ApplicationController@compareApplicationPage")->middleware('auth')->middleware('verified');;
Route::post('/process-submitted-form', "ApplicationController@processSubmittedForm")->middleware('auth')->middleware('verified');;
Route::post('/update-application-breakdown', "ApplicationController@updateApplicationBreakdown")->middleware('auth')->middleware('verified');;
Route::post('/save-approver', "ApplicationController@saveApprover")->middleware('auth')->middleware('verified');
Route::post('/remove-approver', "ApplicationController@removeApprover")->middleware('auth')->middleware('verified');

Route::get('/home', "DashboardController@loadDashboard")->middleware('auth')->middleware('verified');

Route::get('/userprofile', "UserProfileController@loadUserProfilePage")->middleware('auth')->middleware('verified');
Route::post('/save-profile', "UserProfileController@saveProfile")->middleware('auth')->middleware('verified');
Route::post('/save-user', "UserProfileController@saveUser")->middleware('auth')->middleware('verified');


Route::post('/send-approver-invitation', "RegisterController@inviteApprover")->middleware('auth')->middleware('verified');
Route::post('/send-applicant-invitation', "RegisterController@inviteApplicant")->middleware('auth')->middleware('verified');
Route::post('/send-uni-admin-invitation', "RegisterController@inviteUniAdmin")->middleware('auth')->middleware('verified');

Route::get('/deactivate-user/{id}', "SystemAdminController@deactivateUser")->middleware('auth')->middleware('verified');
Route::get('/activate-user/{id}', "SystemAdminController@activateUser")->middleware('auth')->middleware('verified');

Route::get('/view-user/{id}', "UserProfileController@loadUserPage")->middleware('auth')->middleware('verified');
Route::get('/budget-settings', "SystemAdminController@loadBudgetSettingPage")->middleware('auth')->middleware('verified');
Route::post('/save-budget', "SystemAdminController@saveUniversityBudget")->middleware('auth')->middleware('verified');
