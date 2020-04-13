<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends MyController
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
            $user->activation_token = $this->generateId('Ac', 69);
            $user->password = bcrypt($pass1);
            $user->setup = 0;
            $user->who = 0; // clients
            $user->active = false; // set to false on production
            $user->save();

            $this->mailNewUser($user);

            return redirect()->route('login')
                ->withMessage("An email has been sent to $user->email to verify your account. Kindly activate your account from the link in the email. Check your spam folder if not found in mailbox.");
        }

        return back()->withErrors(array('errors'=>'Password Missmatch'))->withInput($request->input());

    }

    public function activateMe($token){
        $user = User::where('activation_token', $token)->where('active', false)->first();
        if(!empty($user)){
            $user->active = true;
            $user->activation_token = "";
            $user->update();
            return redirect()->route('login')
                ->withMessage("Your account is activated. Login has been allowed.");
        }

        return redirect()->route('login');
    }
}
