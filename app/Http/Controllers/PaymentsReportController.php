<?php

namespace App\Http\Controllers;

use App\Models\Loans\LoanApplication;
use App\Models\Payments\Payment;
//use App\Models\Loans\Reports\PaymentReports;
use App\Models\Loans\Schedule;
use App\Models\Loans\Reports\LoanReports;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Excel;

class PaymentsReportController extends Controller
{
    public function index() 
    {   
        $payments = Payment::with('loan_application')
        ->orderBy('created_at', 'DESC')->get();
        return view('reports.payment.all_payments',compact('payments'));
    }

    public function outstandingBalanceReport() 
    {   
       // $report = new PaymentReports;
       // $payments = $report->outstandingBalanceReportForAll();
        // $loan = LoanApplication::where('payment_status','pending');
        /*$loans = LoanApplication::all();
        foreach($loans as $loan){
        $customer     = $loan->customer()->get();
        $loan_product = $loan->loan_product()->get();
        foreach($loan_product as $loanproduct)
            $product=$loanproduct;
        // $payments   = $loan->payment()->get();
        // $schedule = new Schedule($loan,$product);
        $loan_reports = new LoanReports($loan,$product);
        // $ledger   = $loan_reports->loanLedgerReport();
        $balance   = $loan_reports->outstandingBalanceReport(Carbon::now());
        // $arrears_report   = $loan_reports->arrearsReport(Carbon::now());
        // $payment_schedule = $schedule->schedule();
        $outstanding_payments = ['loan','customer','loan_product','balance'];
            array_push($report,$outstanding_payments);
        }*/
           // return $report;
        //dd($payments);
       $loans = LoanApplication::with('loan_product')
            ->with('customer')
            ->orderBy('id','DESC')
            ->get();
        return view('reports.payment.outstanding_payments',compact('loans'));
    }

    public function duePaymentsReport() 
    {   
        $loans = LoanApplication::with('loan_product')
            ->with('customer')
            ->orderBy('id','DESC')
            ->get();
        return view('reports.payment.due_payments_report',compact('loans'));
    }

    public function arrearsReport() 
    {   
        $loans = LoanApplication::with('loan_product')
            ->with('customer')
            ->orderBy('id','DESC')
            ->get();
        return view('reports.payment.arrears_report',compact('loans'));
    }
}
