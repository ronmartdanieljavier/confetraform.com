<?php


namespace App\Model;


use App\Mail\ApplicationProcessed;
use App\Mail\ApplicationSubmitted;
use App\Notifications\ApplicationStatusUpdate;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotificationModel extends Model
{
    protected $table = "notification";

    public function loadNotificationList()
    {
        return $this->where("user_id", Auth::user()->id)
            ->select(
                "user_id AS user_id",
                "id AS notification_id",
                "sign AS notification_sign",
                "message AS notification_message",
                "link AS link",
                "read_flag AS read_flag",
                DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') AS created_date")
            )
            ->orderBy("created_at","DESC")
            ->get();
    }

    public function sendNotificationToUniAdmin($id)
    {
        $user_model_holder = new User();
        $user_data = $user_model_holder->loadUserAccountListByUserType(Auth::user()->university_id, 2);
        foreach($user_data as $row_data) {
            $user_id = $row_data->user_id;
            $this->insertNotification($user_id,"warning", "You have a application to review", "/submitted-application-view/".$id);

            Mail::to($user_model_holder->getFirstUserAccountListById($user_id)->email)->send(new ApplicationSubmitted());
        }
    }
    public function sendNotificationToApprover($user_id, $sign, $message, $link)
    {
        $this->insertNotification($user_id, $sign, $message, $link);
        $user_model_holder = new User();
        Mail::to($user_model_holder->getFirstUserAccountListById($user_id)->email)->send(new ApplicationSubmitted());
    }
    public function sendNotificationToApplicant($user_id, $sign, $message, $link)
    {
        $this->insertNotification($user_id, $sign, $message, $link);
        $user_model_holder = new User();
        Mail::to($user_model_holder->getFirstUserAccountListById($user_id)->email)->send(new ApplicationProcessed());
    }

    public function insertNotification($user_id, $sign, $message, $link)
    {
        $this->insert([
            "user_id" => $user_id,
            "sign" => $sign,
            "message" => $message,
            "link" => $link,
            "created_at" => DB::raw("NOW()")
        ]);
    }
}
