<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanDisbursementRequest;
use App\Models\Loans\LoanDisbursement;
use App\Models\Loans\LoanApplication;
use App\Models\Loans\LoanApproval;
use App\Models\Loans\LoanProduct;
use App\Models\Branches\Branch;
use App\Models\Loans\Schedule;
use Illuminate\Http\Request;
// use Carbon\Carbon;

class LoanDisbursementController extends Controller
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
        $approved_loans = LoanApproval::orderBy('id','DESC')->get();
        return view('loans.disbursement_list',compact('approved_loans'));
    }

    public function create(LoanApplication $loan)
    {   
        return view('loans.disbursement_form',compact('loan'));
    }

    public function store(StoreLoanDisbursementRequest $request, LoanApplication $loan)
    {   
        // dd($loan->approval->amount_approved);
        $loan_disbursement = new LoanDisbursement($request->all());
        if(!$loan_disbursement->save()) {  
            session()->flash('message','Loan NOT Disbursed');
            return redirect()->back();
        }

       /* $loan->approval->status = 'disbursed';
        $loan->approval->save();*/
        
        session()->flash('message','Loan Disbursed Succcessfully');
        return redirect('/loan-disbursement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    //loan schedule

    public function schedule(LoanApplication $loan, LoanProduct $product)
    {   
        $schedule = new Schedule($loan,$product);
        //$interest_method = $product->interest_method;
        $schedule = $schedule->schedule();
        return view('loans.payment_schedule',compact('schedule'));
        /*session()->flash('message','Loan Disbursed Succcessfully');
        return redirect('/loan-applications');*/
        //printf("Right now is %s", Carbon::now()->setTimezone('Africa/Kampala'));
    }

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

    public function importLoansForm()
    {   
        $branches = Branch::all();
        $products = LoanProduct::all();
        return view('loans.loans_importation_form',compact('branches','products'));
    }

    public function import(storeImportedLoansRequest $request)
    {
        $request->customer_import_file->store('uploads/loans');
        if($request->hasFile('loans_import_file')){
            $path = $request->file('loans_import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();

            if(!empty($data) && $data->count())
            {
                $data = $data->toArray();
                for($i=0;$i<count($data);$i++)
                { 
                  $customer = new LoanApplication($data[$i]);
                    if(!$customer->save()){
                        session()->flash('message','Loans NOT Imported');
                        return redirect()->back();
                    }
                }
                session()->flash('message','Loans Imported Succcessfully');
                return redirect('/loans/importation');
          }
        }
    }
}
