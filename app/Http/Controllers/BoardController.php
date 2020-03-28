<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function dashboard(){
        $activity = Transaction::where('active', true)->select(['id'])->get()->count();
        $transactions = Transaction::where('active', true)->paginate(40);
        return view('dashboard.pages.home.index')
            ->with('transactions', $transactions)
            ->with('activity', $activity);
    }
}
