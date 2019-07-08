<?php

namespace App\Http\Controllers;

use App\Models\Loans\LoanApplication;
use App\Models\Loans\LoanAppraisal;
use App\Models\Loans\Collaterals;
//use App\Models\Loans\LoanProduct;
//use App\Models\Loans\Schedule;
//use App\Models\Branches\Branch;
//use App\Models\Customers\Customer;
use Illuminate\Loans\Http\Request;
use App\Http\Requests\StoreLoanAppraisalRequest;
use App\Http\Requests\StoreCollateralRequest;
//use Carbon\Carbon;

class LoanAppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function index()
    {
        $loan_applications = LoanApplication::with('customer')
            ->with('loan_products')
            ->get();
        return view('loans.loan_application_form',compact('loan_applications'));
    }*/

    // that index up is the main index
    public function index()
    {
        $loan_applications = LoanApplication::with('loan_product')
            ->with('customer')
            ->orderBy('id','DESC')
            ->get();
        //$customers = Customer::paginate(10);
        return view('loans.appraisal_list',compact('loan_applications'));
    }

   /* public function create(Customer $customer)
    {   
        $branches = Branch::all();
        $loan_products = LoanProduct::all();
        //$customer    = $customerId;
        //return view('loans.loan_form',compact(['loan_products','customer']));
        return view('loans.loan_form',compact(['loan_products','branches','customer']));
    }*/

    public function create(LoanApplication $loan)
    {   
        return view('loans.appraisal_form',compact('loan'));
    }

     public function index1()
    {
        //$loan_applications = LoanApplications::all();
        $loan_applications = LoanApplication::with('loan_product')
            ->with('customer')
            ->orderBy('id','DESC')
            ->get();
            
        return view('loans.allLoanapplications',compact('loan_applications'));
        //return view('loans.loan_application_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1(Customer $customerId)
    {   
        /*$loan_products = LoanProducts::all();
        $customer    = $customerId;
        return view('loans.loan_form',compact(['loan_products','customer']));*/
        return view('loans.loan_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanAppraisalRequest $request, LoanApplication $loan)
    {	
        $loan_appraisal = new LoanAppraisal($request->all());
        
        if(!$loan_appraisal->save()){
      
            session()->flash('message','Loan appraisal Failed');
            return redirect()->back();
        }
        session()->flash('message','Loan appraisal was succcessful');
        return redirect('/loan-appraisal');
    }

    /*public function indexcc() 
    {
        $collaterals = Collaterals::with('loan_application');
        return view('collaterals.all_collaterals',compact('collaterals'));
    }*/

    /*public function create(LoanApplications $loan)
    {   
        $customer     = $loan->customers()->get();
        $loan_product = $loan->loan_products()->get();
        $collaterals   = $loan->collaterals()->get();

        return view('collaterals.collaterals_form',compact([
            'loan','customer','loan_product','collaterals'
            ]));
    }*/

    public function storeCollateral(StoreCollateralRequest $request)
    {
        $collateral = new Collaterals($request->all());
                    
        if(!$collateral->save()){
           
            session()->flash('message','Collateral NOT Registered');
            return redirect()->back();
        }
        
        session()->flash('message','Collateral Registered Succcessfully');
         return redirect()->back();
    }


    //loan schedule

   /* public function schedule(LoanApplication $loan, LoanProduct $product)
    {   
        $schedule = new Schedule($loan,$product);
        //$interest_method = $product->interest_method;
        $schedule = $schedule->schedule();
        return view('loans.payment_schedule',compact('schedule'));
       
        session()->flash('message','Loan Disbursed Succcessfully');
        return redirect('/loan-applications');
        //printf("Right now is %s", Carbon::now()->setTimezone('Africa/Kampala'));
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\loan_application  $loan_application
     * @return \Illuminate\Http\Response
     */
    public function show(loan_application $loan_application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loan_application  $loan_application
     * @return \Illuminate\Http\Response
     */
    public function edit(loan_application $loan_application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loan_application  $loan_application
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLoanApplicationRequest $request, loan_application $loan_application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loan_application  $loan_application
     * @return \Illuminate\Http\Response
     */
    public function destroy(loan_application $loan_application)
    {
        return LoanApplication::destroy($loan_application);
    }

    public function loan_approval($id)
    {
        $loan=LoanApplication::find($id);
        $loan->approved=1;
         if(!$loan->save()){  
            session()->flash('message','Loan Application NOT Approved');
            return redirect('/loan-application');
        }
        session()->flash('message','Loan Approved Succcessfully');
        return redirect('/loan-application');
    }

    public function loan_disbursement($id)
    {   
        //$loan=LoanApplications::find($id)->with('loan_products');
        //dd($id);
        //use the above whenu resolve the foreign keys issue

        $loan=LoanApplication::find($id);
        $schedule = new Schedule($loan);
        $schedule = $schedule->flat();
     
        return view('loans.payment_schedule',compact('schedule'));
       

        /*$loan=LoanApplication::find($id);
        $loan->disbursed=1;
         if(!$loan->save()){
            
            session()->flash('message','Loan Application NOT Disburseded');
            return redirect('/loan-applications');
        }
        session()->flash('message','Loan Disbursed Succcessfully');
        return redirect('/loan-applications');*/
        //printf("Right now is %s", Carbon::now()->setTimezone('Africa/Kampala'));
    }

    public function reject_loan_application($id)
    {
        $loan=LoanApplication::find($id);
        $loan->disbursed=1;
         if(!$loan->save()){
            
            session()->flash('message','Loan Application NOT Disburseded');
            return redirect('/loan-application');
        }
        session()->flash('message','Loan Disbursed Succcessfully');
        return redirect('/loan-application');
    }
}
