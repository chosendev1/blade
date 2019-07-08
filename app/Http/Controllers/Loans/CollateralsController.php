<?php

namespace App\Http\Controllers;

use App\Models\Collaterals\Collaterals;
use App\Models\Loans\LoanApplications;
use App\Http\Requests\StoreCollateralRequest;

class CollateralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $collaterals = Collaterals::with('loan_application');
        return view('collaterals.customer_collaterals',compact('collaterals'));
    }

    public function create(LoanApplications $loan)
    {   
        $customer     = $loan->customers()->get();
        $loan_product = $loan->loan_products()->get();
        $collaterals   = $loan->collaterals()->get();

        return view('loans.collaterals_form',compact([
            'loan','customer','loan_product','collaterals'
            ]));
    }

    public function store(StoreCollateralRequest $request)
    {
        $collateral = new Collaterals($request->all());
                    
        if(!$collateral->save()){
           
            session()->flash('message','Collateral NOT Registered');
            return redirect()->back();
        }
        
        session()->flash('message','Collateral Registered Succcessfully');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collaterals  $collaterals
     * @return \Illuminate\Http\Response
     */
    public function show(Collaterals $collaterals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collaterals  $collaterals
     * @return \Illuminate\Http\Response
     */
    public function edit(Collaterals $collaterals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collaterals  $collaterals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collaterals $collaterals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collaterals  $collaterals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaterals $collaterals)
    {
        //
    }
}
