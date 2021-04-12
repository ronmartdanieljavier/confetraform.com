<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormTemplateModel extends Model
{
    protected $table = "form_templates";

    public function loadFormList($university_id)
    {
        return $this->where("form_templates.university_id", $university_id)
            ->leftjoin("users AS created", "created.id", "=", "created_by")
            ->leftjoin("users AS updated", "updated.id", "=", "updated_by")
            ->leftjoin("form_status AS status", "status.id", "=", "form_status_id")
            ->select(
                DB::raw("form_templates.id AS id"),
                DB::raw("form_name AS form_name"),
                DB::raw("form_description AS form_description"),
                DB::raw("created_by AS created_by_id"),
                DB::raw("CONCAT(created.first_name, ' ',created.last_name) AS created_by"),
                DB::raw("updated_by AS updated_by_id"),
                DB::raw("CONCAT(updated.first_name, ' ', updated.last_name) AS updated_by"),
                DB::raw("form_status_id AS form_status_id"),
                DB::raw("status.status_name AS status_name"),
                DB::raw("form_templates.created_at AS created_at"),
                DB::raw("form_templates.updated_at AS updated_at")
        )
        ->get();
    }
    public function loadActiveFormList($university_id)
    {
        return $this->where("form_templates.university_id", $university_id)
            ->where("form_status_id", "1")
            ->leftjoin("users AS created", "created.id", "=", "created_by")
            ->leftjoin("users AS updated", "updated.id", "=", "updated_by")
            ->leftjoin("form_status AS status", "status.id", "=", "form_status_id")
            ->select(
                DB::raw("form_templates.id AS id"),
                DB::raw("form_name AS form_name"),
                DB::raw("form_description AS form_description"),
                DB::raw("created_by AS created_by_id"),
                DB::raw("CONCAT(created.first_name, ' ',created.last_name) AS created_by"),
                DB::raw("updated_by AS updated_by_id"),
                DB::raw("CONCAT(updated.first_name, ' ', updated.last_name) AS updated_by"),
                DB::raw("form_status_id AS form_status_id"),
                DB::raw("status.status_name AS status_name"),
                DB::raw("form_templates.created_at AS created_at"),
                DB::raw("form_templates.updated_at AS updated_at")
        )
        ->get();
    }
    public function deleteFormTemplate($id)
    {
        return $this->where("id", $id)
            ->where("university_id", Auth::user()->university_id)
            ->delete();
    }
    public function getFirstFormById($university_id, $id)
    {
        return $this->where("form_templates.id", $id)
            ->where("form_templates.university_id", $university_id)
            ->leftjoin("users AS created", "created.id", "=", "created_by")
            ->leftjoin("users AS updated", "updated.id", "=", "updated_by")
            ->leftjoin("form_status AS status", "status.id", "=", "form_status_id")
            ->select(
                DB::raw("form_templates.id AS id"),
                DB::raw("form_name AS form_name"),
                DB::raw("form_description AS form_description"),
                DB::raw("created_by AS created_by_id"),
                DB::raw("CONCAT(created.first_name, ' ', created.last_name) AS created_by"),
                DB::raw("updated_by AS updated_by_id"),
                DB::raw("CONCAT(updated.first_name, ' ', updated.last_name) AS updated_by"),
                DB::raw("form_status_id AS form_status_id"),
                DB::raw("status.status_name AS status_name"),
                DB::raw("form_templates.created_at AS created_at"),
                DB::raw("form_templates.updated_at AS updated_at")
        )
        ->first();
    }

    public function getFormDetails($form_id)
    {
        return $this->leftjoin("form_section", "form_section.form_id", "=", "form_templates.id")
            ->leftjoin("form_details", "form_details.form_section_id", "=", "form_section.id")
            ->where("form_section.form_id", $form_id)
            ->select(
                DB::raw("form_details.id AS form_detail_id"),
                DB::raw("form_id AS form_id"),
                DB::raw("form_section.id AS form_section_id"),
                DB::raw("form_section.form_section AS form_section"),
                DB::raw("form_section.form_section_order AS form_section_order"),
                DB::raw("field_name AS field_name"),
                DB::raw("field_label AS field_label"),
                DB::raw("field_type AS field_type"),
                DB::raw("field_value AS field_value"),
                DB::raw("field_order AS field_order"),
                DB::raw("field_required AS field_required")
            )
            ->orderBy("form_section_order","ASC")
            ->orderBy("field_order","ASC")
            ->get();
    }

    public function createFormTemplate($form_name, $form_description)
    {
        return $this->insertGetId([
            "form_name" => $form_name,
            "form_description" => $form_description,
            "university_id" => Auth::user()->university_id,
            "form_status_id" => "1",
            "created_at" => DB::raw('NOW()'),
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        ]);
    }
    public function updateFormTemplateById($id, $form_name, $form_description)
    {
        return $this->where("id", $id)->update([
            "form_name" => $form_name,
            "form_description" => $form_description,
            "updated_at" => DB::raw('NOW()')
        ]);
    }
}
