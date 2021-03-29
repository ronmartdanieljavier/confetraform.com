<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationCostBreakdownModel extends Model
{
    protected $table = "application_cost_breakdown";

    public function loadApplicationBreakdown($application_id)
    {
        return $this->where("application_id", $application_id)
            ->get();
    }
    public function createApplicationBreakdown($array_data)
    {
        return $this->insertGetId($array_data);
    }
    public function updateApplicationBreakdownById($id, $array_data)
    {
        return $this->where("id", $id)
            ->update($array_data);
    }
    public function deleteApplicationDetailById($id)
    {
        return $this->where("id", $id)->delete();
    }
    public function deleteApplicationBreakdownByFormId($form_id)
    {
        return $this->where("application_id", $form_id)->delete();
    }
    public function getTotalCostById($form_id)
    {
        return $this->where("application_id", $form_id)->sum("new_amount");
    }
    public function getTotalCost()
    {
        return $this->leftjoin("applications", "applications.id", "=", "application_cost_breakdown.application_id")
            ->leftjoin("users", "users.id", "=", "applications.created_by")
            ->where("users.university_id", Auth::user()->university_id)
            ->where("applications.application_status_id", "3")
            ->sum("new_amount");
    }
    public function getTotalCostByMonth($month)
    {
        return $this->leftjoin("applications", "applications.id", "=", "application_cost_breakdown.application_id")
            ->leftjoin("users", "users.id", "=", "applications.created_by")
            ->where("users.university_id", Auth::user()->university_id)
            ->whereRaw("MONTH(applications.created_at) = ".$month)
            ->where("applications.application_status_id", "3")
            ->sum("new_amount");
    }
}
