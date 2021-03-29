<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationModel extends Model
{
    protected $table = "applications";
    public $timestamps = false;
    public function loadUserList()
    {
        return $this->where("applications.created_by", Auth::user()->id)
            ->leftjoin("users AS created", "created.id", "=", "created_by")
            ->leftjoin("users AS processed", "processed.id", "=", "processed_by")
            ->leftjoin("application_status AS status", "status.id", "=", "application_status_id")
            ->select(
                DB::raw("applications.id AS id"),
                DB::raw("form_name AS form_name"),
                DB::raw("form_description AS form_description"),
                DB::raw("created_by AS created_by_id"),
                DB::raw("CONCAT(created.first_name, ' ',created.last_name) AS created_by"),
                DB::raw("processed_by AS processed_by_id"),
                DB::raw("CONCAT(processed.first_name, ' ', processed.last_name) AS processed_by"),
                DB::raw("application_status_id AS application_status_id"),
                DB::raw("status.status_name AS status_name"),
                DB::raw("applications.created_at AS created_at"),
                DB::raw("applications.processed_at AS processed_at")
            )
            ->get();
    }
    public function getFirstFormById($id)
    {
        return $this->where("applications.id", $id)
            ->where("applications.created_by", Auth::user()->id)
            ->leftjoin("users AS created", "created.id", "=", "created_by")
            ->leftjoin("users AS processed", "processed.id", "=", "processed_by")
            ->leftjoin("application_status AS status", "status.id", "=", "application_status_id")
            ->select(
                DB::raw("applications.id AS id"),
                DB::raw("form_name AS form_name"),
                DB::raw("form_description AS form_description"),
                DB::raw("created_by AS created_by_id"),
                DB::raw("CONCAT(created.first_name, ' ', created.last_name) AS created_by"),
                DB::raw("processed_by AS processed_by_id"),
                DB::raw("CONCAT(processed.first_name, ' ', processed.last_name) AS processed_by"),
                DB::raw("application_status_id AS application_status_id"),
                DB::raw("status.status_name AS status_name"),
                DB::raw("applications.created_at AS created_at"),
                DB::raw("applications.processed_at AS processed_at"),
                DB::raw("applications.processed_by_comment AS processed_by_comment")
            )
            ->first(); // first converts the SINGLE dataset into OBJECT
    }
    public function getFirstUniversityFormById($id)
    {
        return $this->where("applications.id", $id)
            ->where("created.university_id", Auth::user()->university_id)
            ->leftjoin("users AS created", "created.id", "=", "created_by")
            ->leftjoin("users AS processed", "processed.id", "=", "processed_by")
            ->leftjoin("users AS approver", "approver.id", "=", "approver_id")
            ->leftjoin("application_status AS status", "status.id", "=", "application_status_id")
            ->select(
                DB::raw("applications.id AS id"),
                DB::raw("applications.approver_id AS approver_id"),
                DB::raw("form_name AS form_name"),
                DB::raw("form_description AS form_description"),
                DB::raw("created_by AS created_by_id"),
                DB::raw("CONCAT(created.first_name, ' ', created.last_name) AS created_by"),
                DB::raw("created.first_name AS first_name"),
                DB::raw("created.last_name AS last_name"),
                DB::raw("created.contact_number AS contact_number"),
                DB::raw("created.email AS email"),
                DB::raw("created.student_number AS student_number"),
                DB::raw("created.course_id AS course_id"),
                DB::raw("processed_by AS processed_by_id"),
                DB::raw("CONCAT(processed.first_name, ' ', processed.last_name) AS processed_by"),
                DB::raw("CONCAT(approver.first_name, ' ', approver.last_name) AS approver_name"),
                DB::raw("application_status_id AS application_status_id"),
                DB::raw("status.status_name AS status_name"),
                DB::raw("applications.created_at AS created_at"),
                DB::raw("applications.processed_at AS processed_at"),
                DB::raw("applications.processed_by_comment AS processed_by_comment")
            )
            ->first(); // first converts the SINGLE dataset into OBJECT
    }

    public function getFormDetails($application_id)
    {
        return $this->leftjoin("application_section", "application_section.application_id", "=", "applications.id")
            ->leftjoin("applications_details", "applications_details.application_section_id", "=", "application_section.id")
            ->where("application_section.application_id", $application_id)
            ->select(
                DB::raw("applications_details.id AS form_detail_id"),
                DB::raw("application_id AS application_id"),
                DB::raw("application_section.id AS application_section_id"),
                DB::raw("application_section.application_section AS form_section"),
                DB::raw("application_section.application_section_order AS application_section_order"),
                DB::raw("field_name AS field_name"),
                DB::raw("field_label AS field_label"),
                DB::raw("field_type AS field_type"),
                DB::raw("field_value AS field_value"),
                DB::raw("field_order AS field_order")
            )
            ->orderBy("application_section_order","ASC")
            ->orderBy("field_order","ASC")
            ->get(); // get converts the dataset into array that holds many data
    }
    public function createApplication($array_data)
    {
        return $this->insertGetId($array_data);
    }
    public function updateApplicationById($id, $array_data)
    {
        if(Auth::user()->user_type_id == 3) {
            return $this->where("id", $id)
                ->where("approver_id", Auth::user()->id)
                ->update($array_data);
        } else {
            return $this->where("id", $id)
                ->update($array_data);
        }

    }
    public function deleteApplicationById($id)
    {
        return $this->where("id", $id)->delete();
    }

    public function loadAllSubmittedForm()
    {
        return $this->where("created.university_id", Auth::user()->university_id)
            ->leftjoin("users AS created", "created.id", "=", "created_by")
            ->leftjoin("users AS processed", "processed.id", "=", "processed_by")
            ->leftjoin("application_status AS status", "status.id", "=", "application_status_id")
            ->select(
                DB::raw("applications.id AS id"),
                DB::raw("form_name AS form_name"),
                DB::raw("form_description AS form_description"),
                DB::raw("created_by AS created_by_id"),
                DB::raw("CONCAT(created.first_name, ' ', created.last_name) AS created_by"),
                DB::raw("processed_by AS processed_by_id"),
                DB::raw("CONCAT(processed.first_name, ' ', processed.last_name) AS processed_by"),
                DB::raw("application_status_id AS application_status_id"),
                DB::raw("status.status_name AS status_name"),
                DB::raw("applications.created_at AS created_at"),
                DB::raw("applications.processed_at AS processed_at")
            )
            ->get();
    }
    public function loadApproverSubmittedForm()
    {
        return $this->where("created.university_id", Auth::user()->university_id)
            ->leftjoin("users AS created", "created.id", "=", "created_by")
            ->leftjoin("users AS processed", "processed.id", "=", "processed_by")
            ->leftjoin("application_status AS status", "status.id", "=", "application_status_id")
            ->where("applications.approver_id", Auth::user()->id)
            ->select(
                DB::raw("applications.id AS id"),
                DB::raw("form_name AS form_name"),
                DB::raw("form_description AS form_description"),
                DB::raw("created_by AS created_by_id"),
                DB::raw("CONCAT(created.first_name, ' ', created.last_name) AS created_by"),
                DB::raw("processed_by AS processed_by_id"),
                DB::raw("CONCAT(processed.first_name, ' ', processed.last_name) AS processed_by"),
                DB::raw("application_status_id AS application_status_id"),
                DB::raw("status.status_name AS status_name"),
                DB::raw("applications.created_at AS created_at"),
                DB::raw("applications.processed_at AS processed_at")
            )
            ->get();
    }
    public function countProcessedApplication()
    {
        return $this->leftjoin("users", "users.id", "=", "applications.created_by")
            ->where("users.university_id", Auth::user()->university_id)
            ->where("application_status_id", "<>", "1")
            ->count();
    }
    public function countPendingApplication()
    {
        return $this->leftjoin("users", "users.id", "=", "applications.created_by")
            ->where("users.university_id", Auth::user()->university_id)
            ->where("application_status_id", "1")
            ->count();
    }
    public function countApprovedApplication()
    {
        return $this->leftjoin("users", "users.id", "=", "applications.created_by")
            ->where("users.university_id", Auth::user()->university_id)
            ->where("application_status_id", "3")
            ->count();
    }
    public function countDisapprovedApplication()
    {
        return $this->leftjoin("users", "users.id", "=", "applications.created_by")
            ->where("users.university_id", Auth::user()->university_id)
            ->where("application_status_id", "4")
            ->count();
    }
    public function countApplication()
    {
        return $this->leftjoin("users", "users.id", "=", "applications.created_by")
            ->where("users.university_id", Auth::user()->university_id)
            ->count();
    }
}
