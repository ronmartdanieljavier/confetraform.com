<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

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
                "university_code AS university_code",
                "status AS status",
                "created_at AS created_at",
                "updated_at AS updated_at"
            )
            ->get();
    }
}
