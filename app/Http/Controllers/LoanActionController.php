<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loans\LoanApplications;
use App\Models\Loans\Schedule;
use App\Http\Requests\LoanApprovalRequest;

class LoanActionController extends Controller
{
    public function approval(LoanApprovalRequest $request, LoanApplications $id)
    {
    	$just    = $request->approval_justification;
    	dd($id);
        /*$loan=LoanApplications::find($id);
        $loan->approved=1;
        $loan->approval_date=
        $loan->approval_justification=*/
        /* if(!$loan->save()){
            
            session()->flash('message','Loan Application NOT Approved');
            return redirect('/loan-applications');
        }
        session()->flash('message','Loan Approved Succcessfully');
        return redirect('/loan-applications');*/
    }

    public function loan_disbursement($id)
    {   
        //$loan=LoanApplications::find($id)->with('loan_products');
        //dd($id);
        //use the above whenu resolve the foreign keys issue

        $loan=LoanApplications::find($id);
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
        $loan=LoanApplications::find($id);
        $loan->disbursed=1;
         if(!$loan->save()){
            
            session()->flash('message','Loan Application NOT Disburseded');
            return redirect('/loan-applications');
        }
        session()->flash('message','Loan Disbursed Succcessfully');
        return redirect('/loan-applications');
    }
}
