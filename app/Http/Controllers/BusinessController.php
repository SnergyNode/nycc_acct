<?php

namespace App\Http\Controllers;

use App\Model\Asset;
use App\Model\Business;
use App\Model\Capital;
use App\Model\Liability;
use App\Model\Operation;
use App\Model\Transaction;
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

        if(intval($user->setup) === 2 ){
            return redirect()->route('setup.business3');
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
        $business->current = true;
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

    public function setAC(){
        $user = Auth::user();
        if(intval($user->setup) === 2 ){
            $bus = Business::where('user_id', $user->unid)->where('current', true)->first(); // try to get current business
            if(empty($bus)){
                $bus = Business::where('user_id', $user->unid)->first(); // try to get any available business
                if(empty($bus)){
                    return back()->withErrors(array('error'=>'Client Business Logic Missing'));
                }
            }

            $assets = Asset::where('business_id', $bus->unid)->get();
            $capitals = Capital::where('business_id', $bus->unid)->get();
            $liabilities = Liability::where('business_id', $bus->unid)->get();

            return view('dashboard.pages.business.assets_capital')
                ->with('bus_id', $bus->unid)
                ->with('assets', $assets)
                ->with('liabilities', $liabilities)
                ->with('capitals', $capitals);
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

    public function assets_capital(Request $request, $bus_id){
        //store assets or capital of a business
        $type = $request->input('type');
        $user = $request->user();

        try{
            if($type==="asset"){
                $asset = new Asset();
                $asset->unid = $this->generateId('As', 30);
                $asset->name = $request->input('name');
                $asset->date = time();
                $asset->amount = $request->input('amount');
                $asset->active = $request->input('active');
                $asset->business_id = $bus_id;
                $asset->details = $request->input('details');


                $transaction = new Transaction();
                $transaction->unid = $this->generateId('TR', 20);
                $transaction->business_id = $bus_id;
                $transaction->user_id = $user->unid;
                $transaction->date = time();
                $transaction->type = $type;
                $transaction->type_id = $asset->unid;
                $transaction->active = true;
                $transaction->save();

                $asset->trans_id = $transaction->unid;
                $asset->save();

            }elseif ($type==="capital"){
                $capital = new Capital();

                $capital->unid = $this->generateId('Ct', 30);
                $capital->name = $request->input('name');
                $capital->date = time();
                $capital->amount = $request->input('amount');
                $capital->active = $request->input('active');
                $capital->business_id = $bus_id;
                $capital->details = $request->input('details');


                $transaction = new Transaction();
                $transaction->unid = $this->generateId('TR', 20);
                $transaction->business_id = $bus_id;
                $transaction->user_id = $user->unid;
                $transaction->date = time();
                $transaction->type = $type;
                $transaction->type_id = $capital->unid;
                $transaction->active = true;
                $transaction->save();

                $capital->trans_id = $transaction->unid;
                $capital->save();
            }
            elseif ($type==="liability"){
                $liability = new Liability();

                $liability->unid = $this->generateId('Lt', 30);
                $liability->name = $request->input('name');
                $liability->date = time();
                $liability->amount = $request->input('amount');
                $liability->active = $request->input('active');
                $liability->business_id = $bus_id;
                $liability->details = $request->input('details');


                $transaction = new Transaction();
                $transaction->unid = $this->generateId('TR', 20);
                $transaction->business_id = $bus_id;
                $transaction->user_id = $user->unid;
                $transaction->date = time();
                $transaction->type = $type;
                $transaction->type_id = $liability->unid;
                $transaction->active = true;
                $transaction->save();

                $liability->trans_id = $transaction->unid;
                $liability->save();
            }

            else{
                return back()->withErrors(['error'=>'Type not found'])->withInput($request->input());
            }

            return back()->withMessage(ucfirst($type)." added successfully");
        }catch (\Exception $e){
            return back()->withErrors(['error'=>'Ensure that the Value field contains only numbers | '.$e->getMessage()])->withInput($request->input());
        }




    }

    public function completeSetup($bus_id){
        $bus = Business::whereUnid($bus_id)->first();
        if(!empty($bus)){
            $user = $bus->user;
            $user->setup = 3;
            $user->update();
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['error'=>'Business not found']);
    }

}
