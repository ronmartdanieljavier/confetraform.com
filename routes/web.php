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

Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/sys-admins', "SystemAdminController@loadSysAdminPage")->middleware('auth','verified','checkstatus');
Route::get('/uni-admins', "SystemAdminController@loadUniAdminPage")->middleware('auth','verified','checkstatus');
Route::get('/uni-approvers', "UniversityAdminController@loadApproverPage")->middleware('auth','verified','checkstatus');
Route::get('/uni-reviewers', "UniversityAdminController@loadReviewerPage")->middleware('auth','verified','checkstatus');
Route::get('/uni-applicants', "UniversityAdminController@loadApplicantPage")->middleware('auth','verified','checkstatus');

Route::get('/form-list', "FormController@loadFormListPage")->middleware('auth','verified','checkstatus');
Route::get('/application-list', "ApplicationController@loadApplicationListPage")->middleware('auth','verified','checkstatus');

Route::get('/view-form/{id}', "FormController@loadFormById")->middleware('auth','verified','checkstatus');
Route::get('/apply-form/{id}', "ApplicationController@loadFormById")->middleware('auth','verified','checkstatus');

Route::post('/save-form-template', "FormController@saveFormTemplate")->middleware('auth','verified','checkstatus');
Route::post('/delete-form-template/{id}', "FormController@deleteFormTemplate")->middleware('auth','verified','checkstatus');
Route::post('/save-form-section-detail', "FormController@saveFormDetail")->middleware('auth','verified','checkstatus');
Route::post('/delete-form-detail/{id}', "FormController@deleteFormDetail")->middleware('auth','verified','checkstatus');

Route::post('/save-form-section', "FormController@saveFormSection")->middleware('auth','verified','checkstatus');
Route::post('/delete-form-section', "FormController@deleteFormSection")->middleware('auth','verified','checkstatus');
Route::post('/delete-application/{id}', "ApplicationController@deleteApplication")->middleware('auth','verified','checkstatus');

Route::post('/application-list', "ApplicationController@loadApplicationList")->middleware('auth','verified','checkstatus');

Route::post('/submit-application', "ApplicationController@submitApplication")->middleware('auth','verified','checkstatus');
Route::get('/your-application', "ApplicationController@loadUserApplication")->middleware('auth','verified','checkstatus');
Route::get('/view-application/{id}', "ApplicationController@viewUserApplication")->middleware('auth','verified','checkstatus');

Route::get('/submitted-application-list', "ApplicationController@loadAllSubmittedForm")->middleware('auth','verified','checkstatus');
Route::get('/submitted-application-view/{id}', "ApplicationController@viewSubmittedApplication")->middleware('auth','verified','checkstatus');
Route::get('/compare-application-page', "ApplicationController@compareApplicationPage")->middleware('auth','verified','checkstatus');
Route::post('/process-submitted-form', "ApplicationController@processSubmittedForm")->middleware('auth','verified','checkstatus');
Route::post('/update-application-breakdown', "ApplicationController@updateApplicationBreakdown")->middleware('auth','verified','checkstatus');
Route::post('/save-approver', "ApplicationController@saveApprover")->middleware('auth','verified','checkstatus');
Route::post('/remove-approver', "ApplicationController@removeApprover")->middleware('auth','verified','checkstatus');

Route::get('/home', "DashboardController@loadDashboard")->middleware('auth','verified','checkstatus');

Route::get('/userprofile', "UserProfileController@loadUserProfilePage")->middleware('auth','verified','checkstatus');
Route::post('/save-profile', "UserProfileController@saveProfile")->middleware('auth','verified','checkstatus');
Route::post('/save-user', "UserProfileController@saveUser")->middleware('auth','verified','checkstatus');


Route::post('/send-approver-invitation', "RegisterController@inviteApprover")->middleware('auth','verified','checkstatus');
Route::post('/send-applicant-invitation', "RegisterController@inviteApplicant")->middleware('auth','verified','checkstatus');
Route::post('/send-uni-admin-invitation', "RegisterController@inviteUniAdmin")->middleware('auth','verified','checkstatus');

Route::get('/deactivate-user/{id}', "SystemAdminController@deactivateUser")->middleware('auth','verified','checkstatus');
Route::get('/activate-user/{id}', "SystemAdminController@activateUser")->middleware('auth','verified','checkstatus');

Route::get('/deactivate-university/{id}', "SystemAdminController@deactivateUniversity")->middleware('auth','verified','checkstatus');
Route::get('/activate-university/{id}', "SystemAdminController@activateUniversity")->middleware('auth','verified','checkstatus');

Route::get('/view-user/{id}', "UserProfileController@loadUserPage")->middleware('auth','verified','checkstatus');
Route::get('/budget-settings', "SystemAdminController@loadBudgetSettingPage")->middleware('auth','verified','checkstatus');
Route::get('/university-settings', "SystemAdminController@loadUniversitySettingPage")->middleware('auth','verified','checkstatus');
Route::post('/save-budget', "SystemAdminController@saveUniversityBudget")->middleware('auth','verified','checkstatus');

Route::post('/add-university', "SystemAdminController@addUniversity")->middleware('auth','verified','checkstatus');
Route::post('/edit-university', "SystemAdminController@updateUniversity")->middleware('auth','verified','checkstatus');

Route::get('/course-settings', "SystemAdminController@loadCourseSettingPage")->middleware('auth','verified','checkstatus');
Route::post('/add-course', "SystemAdminController@addCourse")->middleware('auth','verified','checkstatus');
Route::post('/edit-course', "SystemAdminController@updateCourse")->middleware('auth','verified','checkstatus');
Route::get('/deactivate-course/{id}', "SystemAdminController@deactivateCourse")->middleware('auth','verified','checkstatus');
Route::get('/activate-course/{id}', "SystemAdminController@activateCourse")->middleware('auth','verified','checkstatus');
Route::get('/load-notification', "SystemAdminController@loadNotification")->middleware('auth','verified','checkstatus');
