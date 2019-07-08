<?php

namespace App\Http\Controllers;

use App\Models\Customers\Guarantors;
use App\Models\Loans\LoanApplications;
use App\Http\Requests\StoreGuarantorRequest;


class GuarantorsController extends Controller
{
    
    public function index()
    {
        $guarantors = Guarantors::with('loan_application');
        return view('guarantors.allGuarantors',compact('guarantors'));
    }

    public function create(LoanApplications $loan)
    {   
        $customer     = $loan->customers()->get();
        $loan_product = $loan->loan_products()->get();
        $guarantors   = $loan->guarantors()->get();

        return view('guarantors.guarantors_form',compact([
            'loan','customer','loan_product','guarantors'
            ]));
    }

    public function store(StoreGuarantorRequest $request)
    {
        $guarantor = new Guarantors($request->all());
                    
        if(!$guarantor->save()){
           
            session()->flash('message','Guarantor NOT Registered');
            return redirect()->back();
        }
        
        session()->flash('message','Guarantor Registered Succcessfully');
         return redirect()->back();
    }


    public function show(Guarantors $guarantor)
    {
        return view('guarantors.guarantorshow', compact('guarantor'));
    }

    public function edit($id)
    {
        $customer = Guarantors::find($id);
        return view('guarantors.guarantoreditform',compact('guarantor'));
    }



}
