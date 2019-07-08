<?php

namespace App\Http\Controllers;

use App\Models\Collaterals\Collateral;
use App\Models\Loans\LoanApplication;
use App\Http\Requests\StoreCollateralRequest;

class CollateralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collaterals(LoanApplication $loan) 
    {
        $collaterals = Collateral::where('loan_applications_id', $loan->id)->get();
        return view('loans.customer_collaterals',compact('collaterals','loan'));
    }

    public function create(LoanApplication $loan)
    {   
        return view('loans.collateral_form',compact([
            'loan'
            ]));
    }

    public function store(StoreCollateralRequest $request, $loan)
    {
        $collateral = new Collateral($request->all());
                    
        if(!$collateral->save()){
           
            session()->flash('message','Collateral NOT Registered');
            return redirect()->back();
        }
        
        session()->flash('message','Collateral Registered Succcessfully');
        return redirect('loan/'.$loan.'/collaterals');
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
