<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'university_id', 'user_type_id', 'status', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function loadUserAccountListByUserType($university_id = null, $user_type_id = null)
    {
        $data_set = $this->leftjoin("user_types", "user_types.id", "=", "user_type_id")
            ->leftjoin("universities", "universities.id", "=", "university_id")
            ->select(
                "users.id AS user_id",
                "first_name AS first_name",
                "last_name AS last_name",
                "email AS email",
                "date_of_birth AS date_of_birth",
                "student_number AS student_number",
                "contact_number AS contact_number",
                "street AS street",
                "suburb AS suburb",
                "state AS state",
                "post_code AS post_code",
                "country AS country",
                "user_type_id AS user_type_id",
                "user_types.user_type_name AS user_type_name",
                "university_id AS university_id",
                "universities.university_name AS university_name",
                "universities.university_branch AS university_branch",
                "users.status AS status",
                "email_verified_at AS email_verified_at"
            );
        if($university_id){
            $data_set = $data_set->where("university_id", $university_id);
        }
        if($user_type_id){
            $data_set = $data_set->where("user_type_id", $user_type_id);
        }
        $data_set = $data_set->get();
        return $data_set;
    }
}
