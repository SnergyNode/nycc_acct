<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function dashboard(Request $request){
        $user = $request->user();
        $activeBus = $user->business->where('user_id', $user->unid)->first();

        $activity = Transaction::where('active', true)->where('user_id', $user->unid)->select(['id'])->get()->count();
        $transactions = Transaction::where('active', true)->where('business_id', $activeBus->unid)->paginate(40);
        return view('dashboard.pages.home.index')
            ->with('transactions', $transactions)
            ->with('activity', $activity);
    }
}
