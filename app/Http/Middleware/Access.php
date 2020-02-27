<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Access
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->active){
                View::share('person', $user);
                //perform extra checks
                return $next($request);

            }else{
                Auth::logout();
                return redirect()->route('login')->withErrors(array('invalid credentials given'));
            }
        }

        Auth::logout();
        return redirect()->route('login')->withErrors(array('User Authentication Required'));

    }
}
