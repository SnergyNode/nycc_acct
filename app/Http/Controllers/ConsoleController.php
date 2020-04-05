<?php

namespace App\Http\Controllers;

use App\Model\Business;
use App\Model\Transaction;
use App\User;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    public function console(Request $request){

        $trans = Transaction::where('active', true)->select(['id'])->get()->count();
        $users = User::where('active', true)->select(['id'])->get()->count();
        $buss = Business::where('active', true)->select(['id'])->get()->count();
        return view('console.pages.home.index')
            ->with('trans', $trans)
            ->with('users', $users)
            ->with('buss', $buss);
    }
}
