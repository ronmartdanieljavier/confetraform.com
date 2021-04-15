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

//Sys Admin (middleware access: sys.admin)
Route::get('/sys-admins', "SystemAdminController@loadSysAdminPage")->middleware('auth','verified','checkstatus','sys.admin');
Route::get('/uni-admins', "SystemAdminController@loadUniAdminPage")->middleware('auth','verified','checkstatus','sys.admin');
Route::post('/send-uni-admin-invitation', "RegisterController@inviteUniAdmin")->middleware('auth','verified','checkstatus','sys.admin');
Route::get('/deactivate-university/{id}', "SystemAdminController@deactivateUniversity")->middleware('auth','verified','checkstatus','sys.admin');
Route::get('/activate-university/{id}', "SystemAdminController@activateUniversity")->middleware('auth','verified','checkstatus','sys.admin');
Route::get('/university-settings', "SystemAdminController@loadUniversitySettingPage")->middleware('auth','verified','checkstatus','sys.admin');
Route::post('/add-university', "SystemAdminController@addUniversity")->middleware('auth','verified','checkstatus','sys.admin');
Route::post('/edit-university', "SystemAdminController@updateUniversity")->middleware('auth','verified','checkstatus','sys.admin');


//Uni Admin (middleware access: uni.admin)
Route::get('/uni-approvers', "UniversityAdminController@loadApproverPage")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/uni-reviewers', "UniversityAdminController@loadReviewerPage")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/uni-applicants', "UniversityAdminController@loadApplicantPage")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/form-list', "FormController@loadFormListPage")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/view-form/{id}', "FormController@loadFormById")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/save-form-template', "FormController@saveFormTemplate")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/delete-form-template/{id}', "FormController@deleteFormTemplate")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/save-form-section-detail', "FormController@saveFormDetail")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/delete-form-detail/{id}', "FormController@deleteFormDetail")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/save-form-section', "FormController@saveFormSection")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/delete-form-section', "FormController@deleteFormSection")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/save-approver', "ApplicationController@saveApprover")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/remove-approver', "ApplicationController@removeApprover")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/send-approver-invitation', "RegisterController@inviteApprover")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/send-applicant-invitation', "RegisterController@inviteApplicant")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/budget-settings', "SystemAdminController@loadBudgetSettingPage")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/save-budget', "SystemAdminController@saveUniversityBudget")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/course-settings', "SystemAdminController@loadCourseSettingPage")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/add-course', "SystemAdminController@addCourse")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/edit-course', "SystemAdminController@updateCourse")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/deactivate-course/{id}', "SystemAdminController@deactivateCourse")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/activate-course/{id}', "SystemAdminController@activateCourse")->middleware('auth','verified','checkstatus','uni.admin');
Route::get('/department-settings', "SystemAdminController@loadDepartmentSettingPage")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/add-department', "SystemAdminController@addDepartment")->middleware('auth','verified','checkstatus','uni.admin');
Route::post('/edit-department', "SystemAdminController@updateDepartment")->middleware('auth','verified','checkstatus','uni.admin');


//Sys Admin & UniAdmin (middleware access: sys.uni.admin)
Route::get('/deactivate-user/{id}', "SystemAdminController@deactivateUser")->middleware('auth','verified','checkstatus','sys.uni.admin');
Route::get('/activate-user/{id}', "SystemAdminController@activateUser")->middleware('auth','verified','checkstatus','sys.uni.admin');
Route::get('/view-user/{id}', "UserProfileController@loadUserPage")->middleware('auth','verified','checkstatus','sys.uni.admin');


//Uni Admin & Approver (middleware access: uni.admin.approver)
Route::get('/submitted-application-list', "ApplicationController@loadAllSubmittedForm")->middleware('auth','verified','checkstatus','uni.admin.approver');
Route::get('/submitted-application-view/{id}', "ApplicationController@viewSubmittedApplication")->middleware('auth','verified','checkstatus','uni.admin.approver');
Route::get('/compare-application-page', "ApplicationController@compareApplicationPage")->middleware('auth','verified','checkstatus','uni.admin.approver');
Route::post('/process-submitted-form', "ApplicationController@processSubmittedForm")->middleware('auth','verified','checkstatus','uni.admin.approver');
Route::post('/update-application-breakdown', "ApplicationController@updateApplicationBreakdown")->middleware('auth','verified','checkstatus','uni.admin.approver');

//Applicant (middleware access: applicant)
Route::get('/application-list', "ApplicationController@loadApplicationListPage")->middleware('auth','verified','checkstatus','applicant');
Route::get('/apply-form/{id}', "ApplicationController@loadFormById")->middleware('auth','verified','checkstatus','applicant');
Route::post('/submit-application', "ApplicationController@submitApplication")->middleware('auth','verified','checkstatus','applicant');
Route::get('/your-application', "ApplicationController@loadUserApplication")->middleware('auth','verified','checkstatus','applicant');
Route::get('/view-application/{id}', "ApplicationController@viewUserApplication")->middleware('auth','verified','checkstatus','applicant');
Route::post('/delete-application/{id}', "ApplicationController@deleteApplication")->middleware('auth','verified','checkstatus','applicant');



//Anyone
Route::get('/home', "DashboardController@loadDashboard")->middleware('auth','verified','checkstatus');
Route::get('/userprofile', "UserProfileController@loadUserProfilePage")->middleware('auth','verified','checkstatus');
Route::post('/save-profile', "UserProfileController@saveProfile")->middleware('auth','verified','checkstatus');
Route::post('/save-user', "UserProfileController@saveUser")->middleware('auth','verified','checkstatus');
Route::get('/load-notification', "SystemAdminController@loadNotification")->middleware('auth','verified','checkstatus');
Route::get('/download/{id}', "SystemAdminController@download")->middleware('auth','verified','checkstatus');
