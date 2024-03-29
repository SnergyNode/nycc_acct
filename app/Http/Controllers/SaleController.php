<?php

namespace App\Http\Controllers;

use App\Model\Cash;
use App\Model\Credit;
use App\Model\Sale;
use App\Model\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SaleController extends MyController
{

    public function index(Request $request)
    {
        //get current business and show details or return back with error

        $user = $request->user();
        $business = $user->business->where('active', true)->where('current', true)->first();
        if(empty($business)){
            return redirect()->route('new.activity')->withErrors(['error'=>'Set at least one business as current.']);
        }

        $sales = Sale::orderBy('date', 'desc')->where('active', true)->where('business_id', $business->unid)->paginate(30);

        return view('dashboard.pages.sale.index')->with('sales', $sales);
    }

    public function create(Request $request)
    {
        $user = $request->user();
        $business = $user->business->where('active', true)->where('current', true)->first();
        if(empty($business)){
            return redirect()->route('new.activity')->withErrors(['error'=>'Set at least one business as current.']);
        }
        return view('dashboard.pages.sale.create');
    }

    public function store(Request $request)
    {
        //

        if(empty($request->input('amount'))){
            return back()->withErrors(['error'=>'Amount Required!'])->withInput($request->input());
        }
        $amount = $request->input('amount');
        $sale_type = $request->input('type');

        $creditVal = null;
        if($sale_type==="cash and credit"){
            if(empty($request->input('credit'))){
                return back()->withErrors(['error'=>'Enter missing values for type : Cash and Credit.'])->withInput($request->input());
            }else{
                $creditVal = $request->input('credit');
            }
        }
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

        $sale_unid = $this->generateId("SL",20);
        $date = !empty($request->input('date'))?strtotime($request->input('date')):time();
        $active = true;
        $business_id = $business->unid;
        $details = $request->input('details');

        $transaction = new Transaction();
        $transaction->unid = $this->generateId('TR', 20);
        $transaction->business_id = $business_id;
        $transaction->user_id = $user->unid;
        $transaction->date = $date;
        $transaction->type = 'sales';
        $transaction->type_id = $sale_unid;
        $transaction->active = true;
        $transaction->save();

        $trans_id = $transaction->unid;
        $sale = new Sale();
        $sale->unid = $sale_unid;
        $sale->date = $date;
        $sale->amount = $amount;
        $sale->active = $active;
        $sale->business_id = $business_id;
        $sale->trans_id = $trans_id;
        $sale->details = $details;
        $sale->type = $sale_type;
        $sale->save();

        if($sale_type==="cash"){
            $cash = new Cash();
            $cash->unid = $this->generateId('Cs_',25);
            $cash->date = $date;
            $cash->amount = $amount;
            $cash->business_id = $business_id;
            $cash->trans_id = $trans_id;
            $cash->type = "sale";
            $cash->model_id = $sale_unid;
            $cash->save();
        }elseif ($sale_type==="cash and credit"){

            $cash = new Cash();
            $cash->unid = $this->generateId('Cs_',25);
            $cash->date = $date;
            $cash->amount = floatval($amount) - floatval($creditVal);
            $cash->business_id = $business_id;
            $cash->trans_id = $trans_id;
            $cash->type = "purchase";
            $cash->model_id = $sale_unid;
            $cash->save();

            //credit sale
            $credit = new Credit();
            $credit->unid = $this->generateId('Cd_', 25);
            $credit->date = $date;
            $credit->amount = $creditVal;
            $credit->business_id = $business_id;
            $credit->trans_id = $trans_id;
            $credit->type = "purchase";
            $credit->model_id = $sale_unid;
            $credit->save();

        }else{
            //credit sale
            $credit = new Credit();
            $credit->unid = $this->generateId('Cd_', 25);
            $credit->date = $date;
            $credit->amount = $amount;
            $credit->business_id = $business_id;
            $credit->trans_id = $trans_id;
            $credit->type = "sale";
            $credit->model_id = $sale_unid;
            $credit->save();
        }

        return back()->withMessage('Entry Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
