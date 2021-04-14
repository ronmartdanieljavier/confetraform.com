<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CourseModel extends Model
{
    protected $table = "courses";

    public function loadCourseList()
    {
        return $this->where("university_id", Auth::user()->university_id)
            ->select(
                "id AS course_id",
                "course_code AS course_code",
                "course_name AS course_name",
                "status AS status"
            )
            ->get();
    }
    public function loadCourseByAuthId()
    {
        return $this->where("university_id", Auth::user()->university_id)
            ->where("id", Auth::user()->course_id)
            ->select(
                "id AS course_id",
                "course_code AS course_code",
                "course_name AS course_name",
                "status AS status"
            )
            ->first();
    }
    public function updateUniversityById($update_array)
    {
        return $this->where("id", Auth::user()->university_id)->update($update_array);
    }
    public function createCourse($array_data)
    {
        return $this->insertGetId($array_data);
    }
    public function updateCourseById($id,$update_array)
    {
        return $this->where("id", $id)->update($update_array);
    }
}
