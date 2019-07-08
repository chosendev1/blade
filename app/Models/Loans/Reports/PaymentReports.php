<?php

namespace App\Models\Loans\Reports;

use Illuminate\Database\Eloquent\Model;
use App\Models\Loans\LoanApplication;
use App\Models\Loans\LoanProduct;
use App\Models\Loans\Reports\LoanReports;
use App\Models\Loans\Schedule;
use Carbon\Carbon;

class PaymentReports extends Model
{	
	
    public function outstandingBalanceReportForAll()
    {   
        // $loan = LoanApplication::where('payment_status','pending');
        $report = [];
        //$loans = LoanApplication::all();
        $loans = LoanApplication::with('loan_product')
            ->with('customer')
            ->orderBy('id','DESC')
            ->get();
        foreach($loans as $loan){
           // dd($loan->outstandingBalanceReport());
        //$customer     = $loan->customer()->get();*/
        /*$loan_product = $loan->loan_product()->get();
        dd($loan_product);
        foreach($loan_product as $loanproduct)
            $product=$loanproduct;*/
        // $payments   = $loan->payment()->get();
        // $schedule = new Schedule($loan,$product);
        
        // $arrears_report   = $loan_reports->arrearsReport(Carbon::now());
        // $payment_schedule = $schedule->schedule();
        //$outstanding_payments = ['loan','balance'];
        //array_push($report,$outstanding_payments);
        array_push($report,$loan);
        }
        return $report;
    }

    public function arrearsReportForAll()
    {   
        // $loan = LoanApplication::where('payment_status','pending');
        $report = [];
         $loans = LoanApplication::with('loan_product')
            ->with('customer')
            ->orderBy('id','DESC')
            ->get();
        foreach($loans as $loan){
        array_push($report,$loan);
        }
        return $report;
    }

    public function dueReportForAllToday()
    {   
        // $loan = LoanApplication::where('payment_status','pending');
        $report = [];
        $loans = LoanApplication::all();
        foreach($loans as $loan){
        $customer     = $loan->customer()->get();
        $loan_product = $loan->loan_product()->get();
        foreach($loan_product as $loanproduct)
            $product=$loanproduct;
        // $payments   = $loan->payment()->get();
        // $schedule = new Schedule($loan,$product);
        $loan_reports = new LoanReports($loan,$product);
        // $ledger   = $loan_reports->loanLedgerReport();
        $due_payments   = $loan_reports->duePaymentsReport(Carbon::now());
        // $payment_schedule = $schedule->schedule();
        $due_payments_report = ['loan','customer','loan_product','due_payments'];
        array_push($report,$due_payments_report);
        }
        return $report;
    }



    //for principal arrears get expected princ or int and deduct paidbyDate
    //therez what we call in period, this will be a date range filter and loop thru with methods
}
