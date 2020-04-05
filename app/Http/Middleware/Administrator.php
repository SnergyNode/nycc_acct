<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Administrator
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
        if(Auth::guard('admin')->check()){
            $user = Auth::guard('admin')->user();
            if($user->active){
                View::share('person', $user);
                //perform extra checks
                return $next($request);

            }else{
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->withErrors(array('invalid credentials given'));
            }
        }

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->withErrors(array('User Authentication Required'));
    }
}
