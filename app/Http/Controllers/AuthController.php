<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function register(){
        return view('pages.form.reg');
    }

    public function login(){
        return view('pages.form.login');
    }

    public function clientValidate(Request $request){
//        return $request->all();
        $access = trim($request->input('access'));
        $password = trim($request->input('password'));

        if(filter_var($access, FILTER_VALIDATE_EMAIL)){
            if (Auth::attempt(['email' => $access, 'password' => $password])) {
                return redirect(route('dashboard'));
            }
            else {
                return back()->withErrors(array('access' => 'Invalid credentials given'));
            }
        }else{
            if (Auth::attempt(['phone' => $access, 'password' => $password])) {
                return redirect(route('dashboard'));
            }
            else {
                return back()->withErrors(array('access' => 'Invalid credentials given'));
            }
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->withMessage('Logout Successful');
    }
}
