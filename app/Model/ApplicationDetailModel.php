<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationDetailModel extends Model
{
    protected $table = "applications_details";

    public function createApplicationDetail($array_data)
    {
        return $this->insertGetId($array_data);
    }
    public function updateApplicationDetailById($id, $array_data)
    {
        return $this->where("id", $id)
            ->update($array_data);
    }
    public function deleteApplicationDetailById($id)
    {
        return $this->where("id", $id)->delete();
    }
}
