<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MyController extends Controller
{
    //
    public function generateId($prefix, $length){

        $id = uniqid($prefix , false);
        $id .= Str::random($length);
        return $id;

    }

    public function makeToken($val){
        $token = "";
        $codes = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codes .= "-_";
        $codes .= "abcdefghijklmnopqrstuvwxyz";
        $codes .= "0123456789";
        $max = strlen($codes);
        for($i=0; $i < $val; $i++){
            $token.= $codes[random_int(0, $max-1)];
        }
        return $token;
    }

    public function passwordResetMail($user){
        $view = view('email.reset_password')
            ->with("email", $user->email)
            ->with("token", $user->reset_token);

        $this->sendMails($user->email, $view, 'Book Keeping - Password Reset');
    }

    public function mailNewUser($user){
        $view = view('email.welcome')
            ->with("user", $user);

        $this->sendMails($user->email, $view, 'Welcome to Book Keeping');
    }

    public function sendMails($mail, $htmlContent, $title){

        $to = $mail;
        $sender = "noreply@digitalasusu.com";

        $separator = md5(time());
        $eol = "\r\n";

        $subject = $title;

        $fromMail = "Book Keeping <$sender>";

        $headersMail = '';

        $headersMail .= "Reply-To:" . $fromMail . "\r\n";
        $headersMail .= "Return-Path: ". $fromMail ."\r\n";
        $headersMail .= 'From: ' . $fromMail . "\r\n";
        $headersMail .= "Organization: Digital Asusu \r\n";

        $headersMail .= 'MIME-Version: 1.0' . "\r\n";

        $headersMail .= "X-Priority: 3\r\n";
        $headersMail .= "X-Mailer: PHP". phpversion() ."\r\n" ;
        $headersMail .=  "Content-Type: text/html; charset=ISO-8859-1; boundary=\"" . $separator . "\"" . $eol;
//        $headersMail .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

        $headersMail .= 'Content-Transfer-Encoding: 7bit' . "\r\n";



//        @mail($to,$subject, $htmlContent, $headersMail, $sender);
        @mail($to,$subject,$htmlContent,$headersMail, "-f ". $sender);

    }
}
