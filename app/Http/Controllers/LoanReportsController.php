<?php

namespace App\Http\Controllers;

use App\Models\Loans\LoanApplication;
use App\Models\Loans\LoanApproval;
use App\Models\Loans\LoanDisbursement;
use App\Models\Loans\LoanAppraisal;
use Carbon\Carbon;
use Excel;

class LoanReportsController extends Controller
{

    public function loanApplicationReport() 
    {   
        $loans = LoanApplication::with('loan_product')
            ->with('customer')
            ->orderBy('id','DESC')
            ->get();
        return view('reports.loans.application_report',compact('loans'));
    }

    public function loanAppraisalReport() 
    {   
        $loans = LoanAppraisal::orderBy('id','DESC')
            ->get();
        return view('reports.loans.appraisal_report',compact('loans'));
    }

    public function loanApprovalReport() 
    {   
        $loans = LoanApproval::with('loan_application')
            ->orderBy('id','DESC')
            ->get();
        return view('reports.loans.approval_report',compact('loans'));
    }

    public function loanDisbursementReport() 
    {   
        $loans = LoanDisbursement::with('loan_application')
            ->orderBy('id','DESC')
            ->get();
        return view('reports.loans.disbursement_report',compact('loans'));
    }
}
