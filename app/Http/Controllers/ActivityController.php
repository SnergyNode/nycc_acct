<?php

namespace App\Http\Controllers;

use App\Model\Expense;
use App\Model\Purchase;
use App\Model\Sale;
use App\Model\Transaction;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function options(Request $request){

        $user = $request->user();
        $activeBus = $user->business->where('user_id', $user->unid)->first();

        $sales = Sale::where('active', true)->where('business_id', $activeBus->unid)->select(['id'])->get()->count();
        $purchase = Purchase::where('active', true)->where('business_id', $activeBus->unid)->select(['id'])->get()->count();
        $expense = Expense::where('active', true)->where('business_id', $activeBus->unid)->select(['id'])->get()->count();
        $trans = Transaction::where('active', true)->where('business_id', $activeBus->unid)->select(['id'])->get()->count();

        return view('dashboard.pages.activity.index')
            ->with("sales", $sales)
            ->with("purchase", $purchase)
            ->with("expense", $expense)
            ->with("trans", $trans);
    }

    public function optionpage(){
        return view('dashboard.pages.activity.option');
    }
}
