<?php

namespace App\Http\Controllers;

use App\Model\ApplicationCostBreakdownModel;
use App\Model\ApplicationModel;
use App\Model\UniversityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    //

    public function loadDashboard()
    {
        switch (Auth::user()->user_type_id) {
            case 1:
                return $this->loadAdminDashboard();
                break;
            case 2:
                return $this->loadAdminDashboard();
                break;
            case 3:
                return redirect("submitted-application-list");
                break;
            case 4:
                return redirect("your-application");
                break;
        }
    }

    public function loadAdminDashboard()
    {
        $application_breakdown_model = new ApplicationCostBreakdownModel();
        $application_model = new ApplicationModel();
        $university_model_holder = new UniversityModel();
        $remaining_budget = $university_model_holder->getFirstUniversity()->university_budget;
        $overall_approved_cost = $application_breakdown_model->getTotalCost();
        $remaining_budget = number_format($remaining_budget, 2, '.', ',');
        $overall_approved_cost = number_format($overall_approved_cost, 2, '.', ',');

        $count_processed_app = $application_model->countProcessedApplication();
        $count_approved_app = $application_model->countApprovedApplication();
        $count_disapproved_app = $application_model->countDisapprovedApplication();
        $count_pending_app = $application_model->countPendingApplication();
        $count_app = $application_model->countApplication();
        $task_percentage = (float) 0.00;
        if($count_app > 0) {
            $task_percentage = ($count_processed_app / $count_app) * 100;
        }
        $task_percentage = number_format($task_percentage, 2, '.', ',');
        $summary_overview = [];
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(1);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(2);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(3);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(4);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(5);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(6);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(7);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(8);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(9);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(10);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(11);
        $summary_overview[] = $application_breakdown_model->getTotalCostByMonth(12);

        $return_array = [
            "remaining_budget" => $remaining_budget,
            "overall_approved_cost" => $overall_approved_cost,
            "task" => $task_percentage,
            "pending_application" => $count_pending_app,
            "for_review" => $count_pending_app,
            "approved" => $count_approved_app,
            "disapproved" => $count_disapproved_app,
            "summary_overview" => json_encode($summary_overview)
        ];
        return view("dashboard_page", $return_array);
    }
    public function loadApproverDashboard()
    {
        return view("dashboard_page");
    }
    public function loadApplicantDashboard()
    {
        return view("dashboard_page");
    }
}
