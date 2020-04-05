<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends MyController
{
    //

    public function register(){
        return view('pages.form.reg');
    }

    public function login(){
        return view('pages.form.login');
    }

    public function admin_login(){
        return view('pages.form.admin_login');
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

    public function adminValidate(Request $request){
//        return $request->all();
        $access = trim($request->input('access'));
        $password = trim($request->input('password'));

        if(filter_var($access, FILTER_VALIDATE_EMAIL)){
            if (Auth::guard('admin')->attempt(['email' => $access, 'password' => $password])) {
                return redirect(route('console'));
            }
            else {
                return back()->withErrors(array('access' => 'Invalid credentials given'));
            }
        }else{
            if (Auth::guard('admin')->attempt(['username' => $access, 'password' => $password])) {
                return redirect(route('console'));
            }
            else {
                return back()->withErrors(array('access' => 'Invalid credentials given'));
            }
        }
    }

    public function logout(Request $request, $guard){

        if($guard==='admin'){
            auth($guard)->logout();
            return redirect()->route('admin.login')->withMessage('Logout Successful');
        }else{
            Auth::logout();
            return redirect()->route('login')->withMessage('Logout Successful');
        }
    }

    public function mailReset(){
        return view('pages.form.forgot_password');
    }

    public function mailResetPass(Request $request){
        //check if email exist
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if(!empty($user)){
            //send email to user
            $token = $this->makeToken(150);

            //set  with 5hrs  lifespan
            $cd = time() + (60 * 60 * 5 );

            $user->reset_exp = $cd;
            $user->reset_token = $token;
            $user->update();

            $this->passwordResetMail($user);

            //send password reset mail to user

        }

        return back()->withMessage("An email sent to $email. Use the link to reset your password");
    }

    public function PasswordReset($email, $token){
        $user = User::where('email', $email)->where('reset_token', $token)->first();
        if(!empty($user)){
            if($user->reset_exp > time()){
                return view('pages.form.reset_password')->with('user', $user);
            }

        }
        return redirect()->route('home');
    }

    public function resetAccForgotPass(Request $request, $unid, $token){
        $pass = $request->input('password');
        $pass_confirm = $request->input('confirm_password');



        if(empty($pass)){
            return back()->withErrors(array('error'=>'Password cannot be empty'));
        }

        if(empty($unid)){
            return back()->withErrors(array('error'=>''));
        }



        if($pass===$pass_confirm){
            $user = User::where('unid', $unid)->where('reset_token', $token)->first();

            if(empty($user)){
                return back()->withErrors(array('error'=>'User not found'));
            }

            $user->reset_token = 0;
            $user->reset_exp = 0;
            $user->password = bcrypt($pass);
            $user->update();

            return redirect()->route('login')->withMessage('Password Reset Successful');
        }

        return back()->withErrors(array('error'=>'Password mismatch'));
    }
}
