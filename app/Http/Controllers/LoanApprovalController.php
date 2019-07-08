<?php

namespace App\Http\Controllers;

use App\Models\Loans\LoanApplication;
use App\Models\Loans\LoanApproval;
use App\Models\Loans\LoanAppraisal;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoanApprovalRequest;
//use Carbon\Carbon;

class LoanApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $appraised_loans = LoanAppraisal::orderBy('id','DESC')->get();
        return view('loans.approval_list',compact('appraised_loans'));
    }

    public function create(LoanApplication $loan)
    {   
        return view('loans.approval_form',compact('loan'));
    }

    public function store(StoreLoanApprovalRequest $request, LoanApplication $loan)
    {   
        $loan_approval = new LoanApproval($request->all());

        if(!$loan_approval->save()) {  
            session()->flash('message','Loan Application NOT Approved');
            return redirect()->back();
        }
        
        session()->flash('message','Loan Approved Succcessfully');
        return redirect('/loan-approval');
    }
}
