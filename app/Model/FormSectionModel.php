<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormSectionModel extends Model
{
    protected $table = "form_section";

    public function createFormSection($array_data)
    {
        return $this->insertGetId($array_data);
    }
    public function updateFormSectionById($id, $array_data)
    {
        return $this->where("id", $id)
            ->update($array_data);
    }
    public function deleteFormSectionById($id)
    {
        return $this->where("id", $id)->delete();
    }
}
