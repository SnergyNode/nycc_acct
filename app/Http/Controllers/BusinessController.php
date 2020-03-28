<?php

namespace App\Http\Controllers;

use App\Model\Business;
use App\Model\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends MyController
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
        return view('dashboard.pages.business.create');
    }

    public function mybusiness(Request $request){

        return view('dashboard.pages.business.mybusiness');
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
     * @param  \App\Model\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }

    public function setup(){
        //check if user has a record
        $user = Auth::user();
        if(intval($user->setup) === 0 ){
            return view('dashboard.pages.business.create');
        }

        if(intval($user->setup) === 1 ){
            return redirect()->route('setup.business2');
        }

    }



    public function stepone(Request $request){

        $user = Auth::user();
        $business = new Business();
        $business->name = $request->input('name');
        $business->info = $request->input('info');
        $business->type = $request->input('type');
        $business->user_id = $user->unid;
        $business->unid = $this->generateId('BUS', 20);
        $business->active = false;
        $business->save();

        $user->setup = 1;
        $user->update();

        return redirect()->route('setup.business2');
    }

    public function setBusType(){
        $user = Auth::user();
        if(intval($user->setup) === 1 ){
            $bus = Business::where('user_id', $user->unid)->first();
            if(empty($bus)){
                return back()->withErrors(array('error'=>'Client Business Logic Missing'));
            }
            $operation = Operation::where('active', true)->get();
            return view('dashboard.pages.business.select_bus')
                ->with('bus_id', $bus->unid)
                ->with('operations', $operation);
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function saveBusType(Request $request, $bus_unid, $operation){

//        return [$bus_unid, $operation];
        $user = Auth::user();

        $bus = Business::where('unid', $bus_unid)->first();


        if(empty($bus)){
            return back()->withErrors(array('error'=>'Business Entity not found. Create One'));
        }

        $bus->active = true;
        $bus->current = true;
        $bus->operation_code = $operation;
        $bus->update();

        $user->setup = 2;
        $user->update();

        return redirect()->route('dashboard');

    }

    public function make_current($unid){
        if(!empty($unid)){
            $bus = Business::whereUnid($unid)->first();
            if(!empty($bus)){
                $offset = Business::where('current', true)->first();
                if(!empty($offset)){
                    $offset->current = false;
                    $offset->update();
                }
                $bus->current = true;
                $bus->update();
                return back()->withMessage("$bus->name is now set for transaction entries");
            }
        }

        return back()->withMessage('Oops, not found');
    }

    public function newBusiness(){
        return view('dashboard.pages.business.create');
    }
}
