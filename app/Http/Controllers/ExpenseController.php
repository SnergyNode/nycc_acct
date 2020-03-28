<?php

namespace App\Http\Controllers;

use App\Model\Expense;
use App\Model\Transaction;
use Illuminate\Http\Request;

class ExpenseController extends MyController
{

    public function index(Request $request)
    {
        //get current business and show details or return back with error

        $user = $request->user();
        $business = $user->business->where('active', true)->where('current', true)->first();
        if(empty($business)){
            return redirect()->route('new.activity')->withErrors(['error'=>'Set at least one business as current.']);
        }

        $expense = Expense::orderBy('date', 'desc')->where('active', true)->where('business_id', $business->unid)->paginate(30);

        return view('dashboard.pages.expense.index')->with('expenses', $expense);
    }

    public function create()
    {
        return view('dashboard.pages.expense.create');
    }

    public function store(Request $request)
    {
        //

        if(empty($request->input('amount'))){
            return back()->withErrors(['error'=>'Amount Required!'])->withInput($request->input());
        }
        $amount = $request->input('amount');
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

        $expense_unid = $this->generateId("EX",20);
        $date = !empty($request->input('date'))?strtotime($request->input('date')):time();
        $active = true;
        $business_id = $business->unid;
        $details = $request->input('details');

        $transaction = new Transaction();
        $transaction->unid = $this->generateId('TR', 20);
        $transaction->business_id = $business_id;
        $transaction->date = $date;
        $transaction->type = 'expenses';
        $transaction->type_id = $expense_unid;
        $transaction->active = true;
        $transaction->save();

        $trans_id = $transaction->unid;
        $expense = new Expense();
        $expense->unid = $expense_unid;
        $expense->date = $date;
        $expense->amount = $amount;
        $expense->active = $active;
        $expense->business_id = $business_id;
        $expense->trans_id = $trans_id;
        $expense->details = $details;
        $expense->save();

        return back()->withMessage('Entry Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
