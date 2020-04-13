<?php

namespace App\Http\Controllers;

use App\Model\Cash;
use App\Model\Credit;
use App\Model\Purchase;
use App\Model\Transaction;
use Illuminate\Http\Request;

class PurchaseController extends MyController
{


    public function index(Request $request)
    {
        //get current business and show details or return back with error

        $user = $request->user();
        $business = $user->business->where('active', true)->where('current', true)->first();
        if(empty($business)){
            return redirect()->route('new.activity')->withErrors(['error'=>'Set at least one business as current.']);
        }

        $purchase = Purchase::orderBy('date', 'desc')->where('active', true)->where('business_id', $business->unid)->paginate(30);

        return view('dashboard.pages.purchase.index')->with('purchases', $purchase);
    }

    public function create(Request $request)
    {
        $user = $request->user();
        $business = $user->business->where('active', true)->where('current', true)->first();
        if(empty($business)){
            return redirect()->route('new.activity')->withErrors(['error'=>'Set at least one business as current.']);
        }
        return view('dashboard.pages.purchase.create');
    }

    public function store(Request $request)
    {
        //

        if(empty($request->input('amount'))){
            return back()->withErrors(['error'=>'Amount Required!'])->withInput($request->input());
        }
        $amount = $request->input('amount');
        $purchase_type = $request->input('type');
        //check if amount is integer
        if(!is_numeric($amount)){
            return back()->withErrors(['error'=>'enter numerical values for amount.'])->withInput($request->input());
        }
        $user = $request->user();
        $business = $user->business->where('active', true)->where('current', true)->first();
        if(!empty($user)){
            if(empty($business)){
                return redirect()->route('new.activity')->withErrors(['error'=>'Make a business active for entries.']);
            }
        }else{
            return redirect()->route('dashboard');
        }

        $purchase_unid = $this->generateId("PR",20);
        $date = !empty($request->input('date'))?strtotime($request->input('date')):time();
        $active = true;
        $business_id = $business->unid;
        $details = $request->input('details');

        $transaction = new Transaction();
        $transaction->unid = $this->generateId('TR', 20);
        $transaction->business_id = $business_id;
        $transaction->user_id = $user->unid;
        $transaction->date = $date;
        $transaction->type = 'purchases';
        $transaction->type_id = $purchase_unid;
        $transaction->active = true;
        $transaction->save();

        $trans_id = $transaction->unid;
        $purchase = new Purchase();
        $purchase->unid = $purchase_unid;
        $purchase->date = $date;
        $purchase->amount = $amount;
        $purchase->active = $active;
        $purchase->business_id = $business_id;
        $purchase->trans_id = $trans_id;
        $purchase->details = $details;
        $purchase->save();

        if($purchase_type==="cash"){
            $cash = new Cash();
            $cash->unid = $this->generateId('Cs_',25);
            $cash->date = time();
            $cash->amount = $amount;
            $cash->business_id = $business_id;
            $cash->trans_id = $trans_id;
            $cash->type = "purchase";
            $cash->model_id = $purchase_unid;
            $cash->save();
        }else{
            //credit sale
            $credit = new Credit();
            $credit->unid = $this->generateId('Cd_', 25);
            $credit->date = time();
            $credit->amount = $amount;
            $credit->business_id = $business_id;
            $credit->trans_id = $trans_id;
            $credit->type = "purchase";
            $credit->model_id = $purchase_unid;
            $credit->save();
        }

        return back()->withMessage('Entry Saved');
    }

    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
