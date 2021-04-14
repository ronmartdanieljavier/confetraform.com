<?php

namespace App\Http\Middleware;

use App\Model\CourseModel;
use App\Model\UniversityModel;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UniAdminCheck
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
        if(Auth::check() && Auth::user()->user_type_id != '2'){
            Auth::logout();
            return redirect('/login')->with('error', 'Your account has no access to that page.');
        }

        return $response;
    }
}
