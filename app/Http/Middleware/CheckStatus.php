<?php

namespace App\Http\Middleware;

use App\Model\CourseModel;
use App\Model\UniversityModel;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //If the status is not approved redirect to login
        if(Auth::check() && Auth::user()->status != '1'){
            Auth::logout();
            return redirect('/login')->with('error', 'Your account has been disabled.');
        }
        if(Auth::check()) {
            $user_model_holder = new UniversityModel();
            $user_model_detail = $user_model_holder->getFirstUniversity();
            if($user_model_detail) {
                if($user_model_detail->status == 0) {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Your university has been disabled.');
                }
            }
        }
        if(Auth::check()) {
            $user_model_holder = new CourseModel();
            $user_model_detail = $user_model_holder->loadCourseByAuthId();
            if($user_model_detail) {
                if($user_model_detail->status == 0) {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Your course has been disabled.');
                }
            }
        }
        return $response;
    }
}
