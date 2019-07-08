<?php

namespace App\Models\Loans\Reports;

use Illuminate\Database\Eloquent\Model;
use App\Models\Loans\Reports\PaymentReports;
use App\Models\Loans\LoanApplication;
use App\Models\Loans\LoanProduct;
use App\Models\Loans\Schedule;
use Carbon\Carbon;

class LoanReports extends PaymentMethods
{	
	public function __construct($loan,$product)
    { 	
    	//dd($this);
    	parent::__construct($loan,$product);
    }
    public function loanLedgerReport()
    {   
        $principal_balance = $this->amount();
        $payments = $this->loan->payment()->get();
        $ledger = [];
        if($this->interest_method == 'flat')
            $interest_balance = $this->flatTotalInterest();
        if($this->interest_method == 'declining')
            $interest_balance = $this->discountedTotalInterest();
        foreach($payments as $payment) {
            $principal = $payment->principal_paid;
            $interest  = $payment->interest_paid;
            $penalty   = $payment->penalty_paid;
            $total_amount_paid  = $principal + $interest;
            $principal_balance -= $principal;
            $interest_balance  -= $interest;
            $total_balance      = $principal_balance + $interest_balance;
            $receipt_number = $payment->receipt_number;
            $cheque_number  = $payment->cheque_number;  
            $payments = [
                'payment_date'      => (Carbon::parse($payment->payment_date))->format('d-m-Y'),
                'receipt_number'    =>  $receipt_number,
                'cheque_number'     =>  $cheque_number,
                'principal_paid'    =>  $principal,
                'interest_paid'     =>  $interest,
                'penalty_paid'      =>  $penalty,
                'total_amount_paid' =>  $total_amount_paid,
                'principal_balance' =>  $principal_balance,
                'interest_balance'  =>  $interest_balance,
               // 'penalty_balance'   =>  $penalty_balance,
                'total_balance'     =>  $total_balance
                ,
            ];
        array_push($ledger, $payments);
        }   
           return collect($ledger);
    }

    public function outstandingBalanceReport($date)
    {   
        $balance = [];
        $balance = $this->outstandingPaymentsAsAt($date);
        $balance_report = [
            'total_principal_paid'  =>  $balance['principal_paid'],
            'total_interest_paid'   =>  $balance['interest_paid'],
            'total_amount_paid'     =>  $balance['total_paid'],
            'principal_balance'     =>  $balance['principal_balance'],
            'interest_balance'      =>  $balance['interest_balance'],
            'total_balance'         =>  $balance['total_balance'],
            'last_payment_date'     =>  $balance['last_payment_date']
        ];  
           return $balance_report;
    }

    public function arrearsReport($date)
    { 
        $arrears = [];
        $arrears = $this->paymentsInArrearsAsAt($date);
            //think about where to store penalties slapped onto a particular loan, may be a table
        $arrears_report = [
            'principal_expected'    =>  $arrears['principal_expected'] ?: '',
            'interest_expected'     =>  $arrears['interest_expected'] ?: '',
            'total_amount_expected' =>  $arrears['total_expected'] ?: '',
            'principal_paid'    =>  $arrears['principal_paid'] ?: '',
            'interest_paid'     =>  $arrears['interest_paid'],
            'total_amount_paid' =>  $arrears['total_paid'],
            'principal_arrears' =>  $arrears['principal_arrears'],
            'interest_arrears'   =>  $arrears['interest_arrears'],
            'total_arreas'      =>  $arrears['total_arrears'],
            'last_payment_date' =>  $arrears['last_payment_date']
        ];
        return $arrears_report;
    }

    public function duePaymentsReport($date)
    {
        $due_payments = [];
        $due_payments = $this->paymentsDueAt($date);
        $due_payments_report = [
            'total_principal_due'  =>  $due_payments['principal_due'],
            'total_interest_due'   =>  $due_payments['interest_due'],
            'total_amount_due'     =>  $due_payments['total_due'],
        ];  
           return $due_payments_report;  
    }

}
