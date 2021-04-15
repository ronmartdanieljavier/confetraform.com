<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DepartmentModel extends Model
{
    protected $table = "department";

    public function loadDepartment($status = 1)
    {
        return $this->where("university_id", Auth::user()->university_id)
            ->select(
                "id AS department_id",
                "department_name AS department_name"
            )
            ->get();
    }
    public function createDepartment($array_data)
    {
        return $this->insertGetId($array_data);
    }
    public function updateDepartmentById($id,$update_array)
    {
        return $this->where("id", $id)->update($update_array);
    }
}
