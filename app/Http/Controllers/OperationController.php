<?php

namespace App\Http\Controllers;

use App\Model\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        //
    }

    public function seed(){
        $seeds = [
            'Trade'=>'Drug Store, Trader, Provision Store etc',
            'Services'=>'Restaurant, Spa, Make-up Artists, Graphics Artists, Printing, Painting etc.',
            'Light Manufacturing'=>'Water Bottling, Wood Works, Metal Works, Food/Argo-Processing, Packaging etc',
        ];

        foreach ($seeds as $key=>$val){
            $code = "$key option";
            $code = strtolower(str_replace(' ', '_', $code));
            //check if exist
            $exist = Operation::where('code_name', $code)->first();
            if(empty($exist)){
                //create record
                $operation = new Operation();
                $operation->name = $key;
                $operation->code_name = $code;
                $operation->info = $val;
                $operation->active = true;
                $operation->save();

            }
        }
    }
}
