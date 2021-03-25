<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationSectionModel extends Model
{
    protected $table = "application_section";

    public function createApplicationSection($array_data)
    {
        return $this->insertGetId($array_data);
    }
    public function updateApplicationSectionById($id, $array_data)
    {
        return $this->where("id", $id)
            ->update($array_data);
    }
    public function deleteApplicationSectionById($id)
    {
        return $this->where("id", $id)->delete();
    }
    public function deleteApplicationSectionByFormId($application_id)
    {
        return $this->where("application_id", $application_id)->delete();
    }
}
