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
                "course_name AS course_name"
            )
            ->get();
    }
    public function updateUniversityById($update_array)
    {
        return $this->where("id", Auth::user()->university_id)->update($update_array);
    }
}
