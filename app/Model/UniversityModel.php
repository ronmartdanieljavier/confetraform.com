<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UniversityModel extends Model
{
    protected $table = "universities";

    public function loadUniversityList($status = 1)
    {
        return $this->where("status", $status)
            ->select(
                "id AS university_id",
                "university_name AS university_name",
                "university_branch AS university_branch",
                "university_budget AS university_budget",
                "university_code AS university_code",
                "status AS status",
                "created_at AS created_at",
                "updated_at AS updated_at"
            )
            ->get();
    }
    public function getFirstUniversity()
    {
        return $this->where("id", Auth::user()->university_id)
            ->select(
                "id AS university_id",
                "university_name AS university_name",
                "university_branch AS university_branch",
                "university_budget AS university_budget",
                "university_code AS university_code",
                "status AS status",
                "created_at AS created_at",
                "updated_at AS updated_at"
            )
            ->first();
    }

    public function updateUniversityById($update_array)
    {
        return $this->where("id", Auth::user()->university_id)->update($update_array);
    }
}
