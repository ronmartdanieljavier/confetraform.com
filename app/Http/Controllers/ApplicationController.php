<?php

namespace App\Http\Controllers;

use App\Model\ApplicationCostBreakdownModel;
use App\Model\ApplicationDetailModel;
use App\Model\ApplicationModel;
use App\Model\ApplicationSectionModel;
use App\Model\FormTemplateModel;
use App\Model\NotificationModel;
use App\Model\UniversityModel;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ApplicationController extends Controller
{
    //

    public function loadApplicationListPage(Request $request)
    {
        $form_model_holder = new FormTemplateModel();
        $form_model_data = $form_model_holder->loadActiveFormList(Auth::user()->university_id);
        return view('application_list_page', ["form_list" => $form_model_data]);
    }

    public function loadFormById($id)
    {
        if($id) {
            $form_model_holder = new FormTemplateModel();
            $form_model_data = $form_model_holder->getFirstFormById(Auth::user()->university_id, $id);
            if($form_model_data) {
                $form_id = $form_model_data->id;
                $form_name = $form_model_data->form_name;
                $form_description = $form_model_data->form_description;
                $status_name = $form_model_data->status_name;

                $form_detail_data = $form_model_holder->getFormDetails($form_id);
                $form_detail_list = [];

                $form_section_uniq = collect($form_detail_data)->unique("form_section");
                foreach ($form_section_uniq as $section_data) {
//                    $field_section_detail_list = [];
                    $field_section_detail_list = collect($form_detail_data)->where("form_section", $section_data["form_section"])->whereNotNull("field_name")->all();
                    $form_detail_list[] = [
                        "form_section_id" => $section_data["form_section_id"],
                        "form_section" => $section_data["form_section"],
                        "field_section_detail_list" => $field_section_detail_list
                    ];
                }
                $user_model_holder = new User();
                $user_info_holder = $user_model_holder->getFirstUserAccountListByAuthId();
                if($user_info_holder) {
                    $course_name = $user_info_holder->course_name;
                    $university_name = $user_info_holder->university_name;
                    $university_branch = $user_info_holder->university_branch;
                    $view_data_array = [
                        "form_id" => $id,
                        "form_name" => $form_name,
                        "form_description" => $form_description,
                        "status_name" => $status_name,
                        "course_name" => $course_name,
                        "university_name" => $university_name,
                        "university_branch" => $university_branch,
                        "form_detail_list" => $form_detail_list,
                    ];
                    return view('application_view', $view_data_array);
                }

            }
        }
        return redirect("application-list");
    }

    public function submitApplication(Request $request)
    {
        $form_id = $request->input("form_id");
        $breakdown_count = $request->input("breakdownCount");

        $form_model_holder = new FormTemplateModel();
        $application_model_holder = new ApplicationModel();
        $application_section_model = new ApplicationSectionModel();
        $application_detail_model = new ApplicationDetailModel();
        $application_breakdown_model = new ApplicationCostBreakdownModel();

        $form_model_data = $form_model_holder->getFirstFormById(Auth::user()->university_id, $form_id);
        if($form_model_data) {
            $form_id = $form_model_data->id;
            $form_name = $form_model_data->form_name;
            $form_description = $form_model_data->form_description;
            $status_name = $form_model_data->status_name;

            $insert_array = [
                "form_name" => $form_name,
                "form_description" => $form_description,
                "application_status_id" => "1",
                "created_by" => Auth::user()->id,
                "created_at" => DB::raw("NOW()")
            ];
            $application_id = $application_model_holder->createApplication($insert_array);

            $form_detail_data = $form_model_holder->getFormDetails($form_id);
            $form_detail_list = [];

            $form_section_uniq = collect($form_detail_data)->unique("form_section");
            foreach ($form_section_uniq as $section_data) {

                $insert_array = [
                    "application_id" => $application_id,
                    "application_section" => $section_data["form_section"],
                    "application_section_order" => 99
                ];
                $section_id = $application_section_model->createApplicationSection($insert_array);
                $field_section_detail_list = collect($form_detail_data)->where("form_section", $section_data["form_section"])->whereNotNull("field_name")->all();

                foreach ($field_section_detail_list as $row_data) {
                    $field_name = $row_data['field_name'];
                    $field_label = $row_data['field_label'];
                    $field_type = $row_data['field_type'];
                    $field_value = $request->input($field_name);
                    $field_order = $row_data['field_order'];

                    $insert_array = [
                        "application_section_id" => $section_id,
                        "field_name" => $field_name,
                        "field_label" => $field_label,
                        "field_type" => $field_type,
                        "field_value" => $field_value,
                        "field_order" => $field_order,
                    ];
                    $application_detail_model->createApplicationDetail($insert_array);
                }
            }

            for($x = 1; $x <= $breakdown_count; $x++) {
                $breakdown_title = $request->input("breakdownTitle_".$x);
                $breakdown_desc = $request->input("breakdownDesc_".$x);
                $breakdown_amount = $request->input("breakdownAmount_".$x);
                $insert_array = [
                    "application_id" => $application_id,
                    "cost_name" => $breakdown_title,
                    "cost_description" => $breakdown_desc,
                    "old_amount" => $breakdown_amount,
                    "new_amount" => $breakdown_amount,
                ];
                $application_breakdown_model->createApplicationBreakdown($insert_array);
            }

            $notification_model_holder = new NotificationModel();
            $notification_model_holder->sendNotificationToUniAdmin($application_id);
        }
        return redirect("your-application");
    }

    public function loadUserApplication()
    {
        $application_model_holder = new ApplicationModel();
        $form_model_data = $application_model_holder->loadUserList();
        return view('user_application_list', ["form_list" => $form_model_data]);
    }

    public function deleteApplication($id)
    {
        $application_model_holder = new ApplicationModel();
        $application_section_model = new ApplicationSectionModel();
        $application_detail_model = new ApplicationDetailModel();
        $application_breakdown_model = new ApplicationCostBreakdownModel();

        $application_model_holder->deleteApplicationById($id);
        $application_section_model->deleteApplicationSectionByFormId($id);
        $application_breakdown_model->deleteApplicationBreakdownByFormId($id);
        return Redirect::back();
    }

    public function viewUserApplication($id)
    {
        if($id) {
            $form_model_holder = new ApplicationModel();
            $form_model_data = $form_model_holder->getFirstFormById($id);
            if($form_model_data) {
                $form_id = $form_model_data->id;
                $form_name = $form_model_data->form_name;
                $form_description = $form_model_data->form_description;
                $status_name = $form_model_data->status_name;
                $application_status_id = $form_model_data->application_status_id;
                $processed_by = $form_model_data->processed_by;
                $processed_at = $form_model_data->processed_at;
                $processed_by_comment = $form_model_data->processed_by_comment;

                $form_detail_data = $form_model_holder->getFormDetails($form_id);
                $form_detail_list = [];

                $form_section_uniq = collect($form_detail_data)->unique("form_section");
                foreach ($form_section_uniq as $section_data) {
//                    $field_section_detail_list = [];
                    $field_section_detail_list = collect($form_detail_data)->where("form_section", $section_data["form_section"])->whereNotNull("field_name")->all();
                    $form_detail_list[] = [
                        "form_section_id" => $section_data["form_section_id"],
                        "form_section" => $section_data["form_section"],
                        "field_section_detail_list" => $field_section_detail_list
                    ];
                }
                $user_model_holder = new User();
                $user_info_holder = $user_model_holder->getFirstUserAccountListByAuthId();
                if($user_info_holder) {
                    $course_name = $user_info_holder->course_name;
                    $university_name = $user_info_holder->university_name;
                    $university_branch = $user_info_holder->university_branch;
                    $application_breakdown_model = new ApplicationCostBreakdownModel();
                    $application_breakdown_data = $application_breakdown_model->loadApplicationBreakdown($id);
                    $total_cost = 0.00;
                    foreach ($application_breakdown_data as $break_data) {
                        $total_cost = $total_cost + (float) $break_data->new_amount;
                    }
                    $total_old_cost = 0.00;
                    foreach ($application_breakdown_data as $break_data) {
                        $total_old_cost = $total_old_cost + (float) $break_data->old_amount;
                    }
                    $view_data_array = [
                        "form_id" => $id,
                        "form_name" => $form_name,
                        "form_description" => $form_description,
                        "processed_by" => $processed_by,
                        "processed_at" => $processed_at,
                        "processed_by_comment" => $processed_by_comment,
                        "status_name" => $status_name,
                        "application_status_id" => $application_status_id,
                        "course_name" => $course_name,
                        "university_name" => $university_name,
                        "university_branch" => $university_branch,
                        "applications_detail_list" => $form_detail_list,
                        "applications_breakdown_list" => $application_breakdown_data,
                        "total_cost" => $total_cost,
                        "total_old_cost" => $total_old_cost,
                    ];
                    return view('submitted_user_application_view', $view_data_array);
                }

            }
        }
        return redirect("your-application");
    }
    public function compareApplicationPage(Request $request)
    {
        $array_id = explode(",",$request->input("ids"));
        if(sizeof($array_id) == 2) {
            $view_data_array = [];
            foreach ($array_id as $each_id) {
                $form_model_holder = new ApplicationModel();
                $form_model_data = $form_model_holder->getFirstUniversityFormById($each_id);
                if($form_model_data) {
                    $form_id = $form_model_data->id;
                    $form_name = $form_model_data->form_name;
                    $approver_id = $form_model_data->approver_id;
                    $approver_name = $form_model_data->approver_name;
                    $form_description = $form_model_data->form_description;
                    $status_name = $form_model_data->status_name;
                    $application_status_id = $form_model_data->application_status_id;
                    $processed_by = $form_model_data->processed_by;
                    $processed_at = $form_model_data->processed_at;
                    $processed_by_comment = $form_model_data->processed_by_comment;

                    $created_by_id = $form_model_data->created_by_id;
                    $form_detail_data = $form_model_holder->getFormDetails($form_id);
                    $form_detail_list = [];

                    $form_section_uniq = collect($form_detail_data)->unique("form_section");
                    foreach ($form_section_uniq as $section_data) {
//                    $field_section_detail_list = [];
                        $field_section_detail_list = collect($form_detail_data)->where("form_section", $section_data["form_section"])->whereNotNull("field_name")->all();
                        $form_detail_list[] = [
                            "form_section_id" => $section_data["form_section_id"],
                            "form_section" => $section_data["form_section"],
                            "field_section_detail_list" => $field_section_detail_list
                        ];
                    }
                    $user_model_holder = new User();
                    $user_info_holder = $user_model_holder->getFirstUserAccountListById($created_by_id);
                    if($user_info_holder) {
                        $email = $form_model_data->email;
                        $contact_number = $form_model_data->contact_number;
                        $student_number = $form_model_data->student_number;
                        $first_name = $form_model_data->first_name;
                        $last_name = $form_model_data->last_name;
                        $course_name = $user_info_holder->course_name;
                        $university_name = $user_info_holder->university_name;
                        $university_branch = $user_info_holder->university_branch;
                        $application_breakdown_model = new ApplicationCostBreakdownModel();
                        $application_breakdown_data = $application_breakdown_model->loadApplicationBreakdown($each_id);
                        $total_cost = 0.00;
                        foreach ($application_breakdown_data as $break_data) {
                            $total_cost = $total_cost + (float) $break_data->new_amount;
                        }
                        $total_old_cost = 0.00;
                        foreach ($application_breakdown_data as $break_data) {
                            $total_old_cost = $total_old_cost + (float) $break_data->old_amount;
                        }
                        $university_budget = 0.00;
                        $university_model_holder = new UniversityModel();
                        $university_data = $university_model_holder->getFirstUniversity();
                        if($university_data) {
                            $university_budget = $university_data->university_budget;
                        }
                        $new_balance = (float) $university_budget - (float) $total_cost;
                        $approver_list = $user_model_holder->loadApproverWithDepartment();
                        $view_data_array[] = [
                            "approver_list" => $approver_list,
                            "form_id" => $each_id,
                            "form_name" => $form_name,
                            "approver_id" => $approver_id,
                            "approver_name" => $approver_name,
                            "form_description" => $form_description,
                            "email" => $email,
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "contact_number" => $contact_number,
                            "student_number" => $student_number,
                            "status_name" => $status_name,
                            "application_status_id" => $application_status_id,
                            "processed_by" => $processed_by,
                            "processed_at" => $processed_at,
                            "processed_by_comment" => $processed_by_comment,
                            "course_name" => $course_name,
                            "university_name" => $university_name,
                            "university_branch" => $university_branch,
                            "applications_detail_list" => $form_detail_list,
                            "applications_breakdown_list" => $application_breakdown_data,
                            "total_cost" => number_format($total_cost, 2, '.', ','),
                            "total_old_cost" => number_format($total_old_cost, 2, '.', ','),
                            "university_budget" => number_format($university_budget, 2, '.', ','),
                            "new_balance" => number_format($new_balance, 2, '.', ','),
                        ];

                    }

                }
            }
            return view('submitted_user_application_view_compare', ["compare_list" => $view_data_array]);

        }
//        return redirect("your-application");
    }
    public function viewSubmittedApplication($id)
    {
        if($id) {
            $form_model_holder = new ApplicationModel();
            $form_model_data = $form_model_holder->getFirstUniversityFormById($id);
            if($form_model_data) {

                $form_id = $form_model_data->id;
                $form_name = $form_model_data->form_name;
                $approver_id = $form_model_data->approver_id;
                $approver_name = $form_model_data->approver_name;
                $form_description = $form_model_data->form_description;
                $status_name = $form_model_data->status_name;
                $application_status_id = $form_model_data->application_status_id;
                $processed_by = $form_model_data->processed_by;
                $processed_at = $form_model_data->processed_at;
                $processed_by_comment = $form_model_data->processed_by_comment;

                $created_by_id = $form_model_data->created_by_id;
                $form_detail_data = $form_model_holder->getFormDetails($form_id);
                $form_detail_list = [];
                if(Auth::user()->user_type_id == 3) {
                    if($approver_id !== Auth::user()->id) {
                        return redirect("/submitted-application-list");
                    }
                }
                $form_section_uniq = collect($form_detail_data)->unique("form_section");
                foreach ($form_section_uniq as $section_data) {
//                    $field_section_detail_list = [];
                    $field_section_detail_list = collect($form_detail_data)->where("form_section", $section_data["form_section"])->whereNotNull("field_name")->all();
                    $form_detail_list[] = [
                        "form_section_id" => $section_data["form_section_id"],
                        "form_section" => $section_data["form_section"],
                        "field_section_detail_list" => $field_section_detail_list
                    ];
                }
                $user_model_holder = new User();
                $user_info_holder = $user_model_holder->getFirstUserAccountListById($created_by_id);
                if($user_info_holder) {
                    $email = $form_model_data->email;
                    $contact_number = $form_model_data->contact_number;
                    $student_number = $form_model_data->student_number;
                    $first_name = $form_model_data->first_name;
                    $last_name = $form_model_data->last_name;
                    $course_name = $user_info_holder->course_name;
                    $university_name = $user_info_holder->university_name;
                    $university_branch = $user_info_holder->university_branch;
                    $application_breakdown_model = new ApplicationCostBreakdownModel();
                    $application_breakdown_data = $application_breakdown_model->loadApplicationBreakdown($id);
                    $total_cost = 0.00;
                    foreach ($application_breakdown_data as $break_data) {
                        $total_cost = $total_cost + (float) $break_data->new_amount;
                    }
                    $total_old_cost = 0.00;
                    foreach ($application_breakdown_data as $break_data) {
                        $total_old_cost = $total_old_cost + (float) $break_data->old_amount;
                    }
                    $university_budget = 0.00;
                    $university_model_holder = new UniversityModel();
                    $university_data = $university_model_holder->getFirstUniversity();
                    if($university_data) {
                        $university_budget = $university_data->university_budget;
                    }
                    $new_balance = (float) $university_budget - (float) $total_cost;

                    $approver_list = $user_model_holder->loadApproverWithDepartment();

                    $view_data_array = [
                        "approver_list" => $approver_list,
                        "form_id" => $id,
                        "form_name" => $form_name,
                        "approver_id" => $approver_id,
                        "approver_name" => $approver_name,
                        "form_description" => $form_description,
                        "email" => $email,
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "contact_number" => $contact_number,
                        "student_number" => $student_number,
                        "status_name" => $status_name,
                        "application_status_id" => $application_status_id,
                        "processed_by" => $processed_by,
                        "processed_at" => $processed_at,
                        "processed_by_comment" => $processed_by_comment,
                        "course_name" => $course_name,
                        "university_name" => $university_name,
                        "university_branch" => $university_branch,
                        "applications_detail_list" => $form_detail_list,
                        "applications_breakdown_list" => $application_breakdown_data,
                        "total_cost" => number_format($total_cost, 2, '.', ','),
                        "total_old_cost" => number_format($total_old_cost, 2, '.', ','),
                        "university_budget" => number_format($university_budget, 2, '.', ','),
                        "new_balance" => number_format($new_balance, 2, '.', ','),
                    ];
                    return view('submitted_application_view', $view_data_array);
                }

            }
        }
        return redirect("/submitted-application-list");
    }

    public function loadAllSubmittedForm()
    {
        $form_model_holder = new ApplicationModel(); // initiate the model
        if(Auth::user()->user_type_id == 2) {
            $application_data = $form_model_holder->loadAllSubmittedForm(); // get the dataset from the model
        }
        if(Auth::user()->user_type_id == 3) {
            $application_data = $form_model_holder->loadApproverSubmittedForm(); // get the dataset from the model
        }
        //set $application_data into $form_list
        return view('submitted_user_application_page', ["form_list" => $application_data]);
    }

    public function processSubmittedForm(Request $request)
    {
        $application_id = $request->input("formId");
        $comment = $request->input("comment");
        $action = $request->input("action");
        $form_model_holder = new ApplicationModel();
        switch ($action) {
            case "Approve":
                $array_data = [
                    "processed_by" => Auth::user()->id,
                    "processed_at" => DB::raw("NOW()"),
                    "processed_by_comment" => $comment,
                    "application_status_id" => 3
                ];
                $form_model_holder->updateApplicationById($application_id, $array_data);

                $application_breakdown_model = new ApplicationCostBreakdownModel();
                $university_model_holder = new UniversityModel();
                $university_data = $university_model_holder->getFirstUniversity();
                if($university_data) {
                    $new_budget = $university_data->university_budget;
                    $breakdown_amount = $application_breakdown_model->getTotalCostById($application_id);
                    $new_budget = (float) $new_budget - (float) $breakdown_amount;
                    $update_array = [
                        "university_budget" => $new_budget
                    ];
                    $university_model_holder->updateUniversityByAuthId($update_array);
                }
                $app_data = $form_model_holder->getFirstUniversityFormById($application_id);
                $notification_model_holder = new NotificationModel();
                $notification_model_holder->sendNotificationToApplicant($app_data->created_by_id, "success", "Your application has been approved", "/view-application/".$application_id);
                break;
            case "Disapprove":
                $array_data = [
                    "processed_by" => Auth::user()->id,
                    "processed_at" => DB::raw("NOW()"),
                    "processed_by_comment" => $comment,
                    "application_status_id" => 4
                ];
                $form_model_holder->updateApplicationById($application_id, $array_data);
                $app_data = $form_model_holder->getFirstUniversityFormById($application_id);
                $notification_model_holder = new NotificationModel();
                $notification_model_holder->sendNotificationToApplicant($app_data->created_by_id, "danger", "Your application has been disapproved", "/view-application/".$application_id);
                break;
            case "Undo Status":
                $application_status_id = 1;
                if(Auth::user()->user_type_id == 3) {
                    $application_status_id = 2;
                }
                $array_data = [
                    "processed_by" => null,
                    "processed_at" => null,
                    "processed_by_comment" => '',
                    "application_status_id" => $application_status_id
                ];
                $form_model_holder->updateApplicationById($application_id, $array_data);
                $application_breakdown_model = new ApplicationCostBreakdownModel();
                $university_model_holder = new UniversityModel();
                $university_data = $university_model_holder->getFirstUniversity();
                if($university_data) {
                    $new_budget = $university_data->university_budget;
                    $breakdown_amount = $application_breakdown_model->getTotalCostById($application_id);
                    $new_budget = (float) $new_budget + (float) $breakdown_amount;
                    $update_array = [
                        "university_budget" => $new_budget
                    ];
                    $university_model_holder->updateUniversityByAuthId($update_array);
                }
                $app_data = $form_model_holder->getFirstUniversityFormById($application_id);
                $notification_model_holder = new NotificationModel();
                $notification_model_holder->sendNotificationToApplicant($app_data->created_by_id, "warning", "Your application is went back to for review by admin", "/view-application/".$application_id);
                break;
        }
        return Redirect::back();
    }
    public function saveApprover(Request $request)
    {
//        dd($request->all());
        $application_id = $request->input("formId");
        $approver_id = $request->input("approver_id");
        $form_model_holder = new ApplicationModel();
        $array_data = [
            "approver_id" => $approver_id,
            "application_status_id" => 2
        ];
        $form_model_holder->updateApplicationById($application_id, $array_data);
        $application_breakdown_model = new ApplicationCostBreakdownModel();
        $university_model_holder = new UniversityModel();
        $university_data = $university_model_holder->getFirstUniversity();
        if($university_data) {
            $new_budget = $university_data->university_budget;
            $breakdown_amount = $application_breakdown_model->getTotalCostById($application_id);
            $new_budget = (float) $new_budget - (float) $breakdown_amount;
            $update_array = [
                "university_budget" => $new_budget
            ];
            $university_model_holder->updateUniversityByAuthId($update_array);
        }
        $notification_model_holder = new NotificationModel();
        $notification_model_holder->sendNotificationToApprover($approver_id, "warning", "Admin assign you as approver for this application", "/submitted-application-view/".$application_id);
        return Redirect::back();
    }
    public function removeApprover(Request $request)
    {
//        dd($request->all());
        $application_id = $request->input("formId");
        $approver_id = $request->input("approver_id");
        $form_model_holder = new ApplicationModel();
        $app_data = $form_model_holder->getFirstUniversityFormById($application_id);
        $notification_model_holder = new NotificationModel();
        $notification_model_holder->sendNotificationToApprover($app_data->approver_id, "danger", "Admin removed you as approver for this application", "/submitted-application-view/".$application_id);

        $array_data = [
            "approver_id" => 0,
            "application_status_id" => 1
        ];
        $form_model_holder->updateApplicationById($application_id, $array_data);
        $application_breakdown_model = new ApplicationCostBreakdownModel();
        $university_model_holder = new UniversityModel();
        $university_data = $university_model_holder->getFirstUniversity();
        if($university_data) {
            $new_budget = $university_data->university_budget;
            $breakdown_amount = $application_breakdown_model->getTotalCostById($application_id);
            $new_budget = (float) $new_budget - (float) $breakdown_amount;
            $update_array = [
                "university_budget" => $new_budget
            ];
            $university_model_holder->updateUniversityByAuthId($update_array);
        }

        return Redirect::back();
    }
    public function updateApplicationBreakdown(Request $request)
    {
        $breakdown_id = $request->input("breakdown_id");
        $breakdownAmount = $request->input("breakdownAmount_".$breakdown_id);
        $application_breakdown_model = new ApplicationCostBreakdownModel();
        $array_data = [
            "new_amount" => (float) $breakdownAmount
        ];
        $application_breakdown_model->updateApplicationBreakdownById($breakdown_id,$array_data);
        return Redirect::back();
    }
}
