<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function dashboard(){
        $activity = Transaction::where('active', true)->select(['id'])->get()->count();
        return view('dashboard.pages.home.index')->with('activity', $activity);
    }
}
