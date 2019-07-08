<?php

namespace App\Models\Loans\Reports;

use Illuminate\Database\Eloquent\Model;
use App\Models\Loans\LoanApplications;
use App\Models\Loans\LoanProducts;
use App\Models\Loans\Schedule;
use Carbon\Carbon;

class PaymentMethods extends Schedule
{	
	public function __construct($loan,$product)
    { 	
    	//dd($this);
    	parent::__construct($loan,$product);
    }

     public function paymentsDueAt($date)
    {   
        $principal_due = 0;
        $interest_due  = 0;
        $schedule = $this->schedule();

        foreach($schedule as $installment){ //for a given loan, an instalment is only due once
            $due_date = Carbon::parse($installment['due_date']);
            if( strtotime($due_date) == strtotime($date) ){ // due date
                $principal_due  = $installment['principal'];
                $interest_due   = $installment['interest'];
                continue;
            }            
        }
        return ['principal_due' => $principal_due,
                'interest_due' => $interest_due,
                'total_due' => $principal_due + $principal_due
               ];
    }

    //due in period will be determined by a range chosen by the user
    function overallScheduledPayments()
    {
        $principal_expected = 0;
        $interest_expected  = 0;
        $schedule = $this->schedule();

        foreach($schedule as $installment){ //for a given loan, an instalment is only due once
            $principal_expected  += $installment['principal'];
            $interest_expected   += $installment['interest'];
        }            
        return [
            'principal_expected' => $principal_expected,
            'interest_expected' => $interest_expected
        ];
    }

    function paymentsExpectedAsAt($date)
    {
        $principal_expected = 0;
        $interest_expected  = 0;
        $schedule = $this->schedule();

        foreach($schedule as $installment){ //for a given loan, an instalment is only due once
            $due_date = (new Carbon($installment['due_date']))->format('Y-m-d');
            if( strtotime($due_date) <= strtotime($date) ){ // due date
                $principal_expected  += $installment['principal'];
                $interest_expected  += $installment['interest'];
                continue;
            }            
        }
        return [
            'principal_expected' => $principal_expected,
            'interest_expected' => $interest_expected
            ];
    }
    
    function paymentsMadeAsAt($date)
    {   
        $principal_paid = 0;
        $interest_paid = 0;
        $last_payment_date = '';
        $payments = $this->loan->payment()->get();
        foreach($payments as $payment) {
            //if(Carbon::parse($payment->payment_date)->lessOrEqual(Carbon::now())) { 
            if(strtotime($payment->payment_date) <= strtotime($date)) {            
            $principal_paid += $payment->principal_paid;
            $interest_paid  += $payment->interest_paid;
            $last_payment_date  = $payment->payment_date;
            }
        continue;
        }
        return [
            'principal_paid' => $principal_paid,
            'interest_paid'  => $interest_paid,
            'last_payment_date' => $last_payment_date
            ];
    }

    function paymentsInArrearsAsAt($date)
    {   
    	$expected = [];
    	$actual   = [];
    	
        $expected = $this->paymentsExpectedAsAt($date);
        $actual   = $this->paymentsMadeAsAt($date);

    	$principal_expected = $expected['principal_expected'];
    	$interest_expected  = $expected['interest_expected'];
    	$principal_paid = $actual['principal_paid'];
    	$interest_paid  = $actual['interest_paid'];
    	$last_date = $actual['last_payment_date'] ?  Carbon::parse($actual['last_payment_date'])->format('d-m-Y'): '';
        
        $principal_arrears = $principal_expected - $principal_paid;
        $interest_arrears  = $interest_expected  - $interest_paid;
        $total_arrears	   = ($principal_arrears < 0 ? 0 : $principal_arrears) 
        					+ ($interest_arrears < 0 ? 0 : $interest_arrears);
        $total_expected	   = $principal_expected + $interest_expected;
        $total_paid	   	   = $principal_paid + $interest_paid;

        //look at a number formater and format amounts below to thousands
        return [
        	'principal_expected' 	=> $principal_expected,  
            'interest_expected'  	=> $interest_expected, 
            'total_expected'		=> $total_expected, 
        	'principal_paid' 	=> $principal_paid > 0 ? $principal_paid : '',  
            'interest_paid'  	=> $interest_paid > 0 ? $interest_paid : '', 
            'total_paid'		=> $total_paid > 0 ? $total_paid : '', 
            'principal_arrears' => $principal_arrears > 0 ? $principal_arrears : '', 
            'interest_arrears'  => $interest_arrears > 0 ? $interest_arrears :  '', 
            'total_arrears'		=> $total_arrears > 0 ? $total_arrears : '',
            'last_payment_date' => $last_date
            ];
    }

    function outstandingPaymentsAsAt($date)
    {   
    	$overall = [];
    	$actual   = [];
        $overall = $this->overallScheduledPayments();
        $actual   = $this->paymentsMadeAsAt($date);

    	$principal_expected = $overall['principal_expected'];
    	$interest_expected  = $overall['interest_expected'];
    	$principal_paid = $actual['principal_paid'];
    	$interest_paid  = $actual['interest_paid'];
    	$last_date = $actual['last_payment_date'] ?  Carbon::parse($actual['last_payment_date'])->format('d-m-Y'): '';
        
        $principal_balance = $principal_expected - $principal_paid;
        $interest_balance  = $interest_expected  - $interest_paid;
        $total_balance	   = $principal_balance + $interest_balance;
        $total_paid	   	   = $principal_paid + $interest_paid;

        //look at a number formater and format amounts below to thousands
        return [
        	'principal_paid' 	=> $principal_paid > 0 ? $principal_paid : ' ',  
            'interest_paid'  	=> $interest_paid > 0 ? $interest_paid : ' ', 
            'total_paid'		=> $total_paid > 0 ? $total_paid : ' ', 
            'principal_balance' => $principal_balance > 0 ? $principal_balance : ' ', 
            'interest_balance'  => $interest_balance > 0 ? $interest_balance :  ' ', 
            'total_balance'		=> $total_balance > 0 ? $total_balance : ' ',
            'last_payment_date' => $last_date
            ];
    }

    //for principal arrears get expected princ or int and deduct paidbyDate
    //therez what we call in period, this will be a date range filter and loop thru with methods
}
