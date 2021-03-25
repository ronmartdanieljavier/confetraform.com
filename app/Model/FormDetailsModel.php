<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormDetailsModel extends Model
{
    protected $table = "form_details";

    public function checkIfNameIsExist($form_id, $current_id, $field_name)
    {
        return $this->where("id", "<>", $current_id)
            ->where("form_section.form_id", $form_id)
            ->where("form_details.field_name", $field_name)
            ->leftjoin("form_section", "form_section.id", "=", "form_details.form_section_id")
            ->first();
    }
    public function createFormDetail($array_data)
    {
        return $this->insertGetId($array_data);
    }
    public function updateFormDetailById($id, $array_data)
    {
        return $this->where("id", $id)
            ->update($array_data);
    }
    public function deleteFormDetailById($id)
    {
        return $this->where("id", $id)->delete();
    }
    public function deleteFormDetailBySectionId($section_id)
    {
        return $this->where("form_section_id", $section_id)->delete();
    }
}
