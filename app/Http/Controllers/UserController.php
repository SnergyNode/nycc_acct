<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function signup(Request $request){

        $pass1 = $request->input('password');
        $pass2 = $request->input('password_confirm');

        $request->validate([
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
        ]);

        if($pass2===$pass1){
            $user = new User();
            $user->unid = uniqid('U', false);
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($pass1);
            $user->setup = 0;
            $user->who = 0; // clients
            $user->active = true; // set to false on production
            $user->save();

            return redirect()->route('login')->withMessage('Account Created Successfully');
        }

        return back()->withErrors(array('errors'=>'Password Missmatch'))->withInput($request->input());

    }
}
