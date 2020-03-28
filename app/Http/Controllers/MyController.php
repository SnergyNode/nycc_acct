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
}
