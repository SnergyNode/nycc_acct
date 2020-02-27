<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function dashboard(){
        return view('dashboard.pages.home.index');
    }
}
