<?php

namespace App\Models\Loans;

use Illuminate\Database\Eloquent\Model;
use App\Models\Loans\LoanProduct;
use App\Models\Payments\Payment;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    public $interest_rate;
    public $loan;
    public $loan_id;
    public $interestmethod;
    public $interest_method;
    public $penalty_rate;
    public $grace_period;
    public $frequency;
    public $due_date;
    public $disbursement_date;
    public $p;
    public $r;
    public $n;
    public $schedule = [];
    public $collection;
    public $loan_balance;
    public $product_id;

    public function __construct($loan)
    {  
        $this->loan              = $loan;
        // dd($loan);
        // $this->product_id        = $loan->loan_product_id;
        $this->interest_method   = $this->getInterestMethod($loan->loan_product);
        $this->interest_rate     = $this->getInterestRate($loan->loan_product)/100;
        $this->penalty_rate      = $this->getPenaltyRate($loan->loan_product);
        $this->grace_period      = $this->getGracePeriod($loan->loan_product);
        $this->frequency         = $this->getFrequency($loan->loan_product);
        $this->loan_period       = $loan->loan_period;
        $this->amount            = $loan->amount_applied;
        $this->disbursement_date = $loan->loan_application_date;
        // $this->amount            = $loan->approval->amount_approved;
        // $this->disbursement_date = $loan->disbursement->disbursement_date;       
    } 
    public function amount()
    {
       return $this->amount;
    }
    public function loanPeriod()
    {
       return $this->loan_period;
    }
    public function interestRate()
    {
       return $this->interest_rate;
    }
    public function loanPrincipal() 
    {
       return $this->amount() / $this->loanPeriod();
    }
    public function flatTotalInterest()
    {
       return $this->interestRate()*$this->amount()*$this->loanPeriod();
    }
    public function flatTotalLoanBalance()
    {
       return $this->amount() + $this->flatTotalInterest();
    }

    public function schedule()
    {
        if($this->interest_method=='flat')
            $schedule = $this->flat();
        if($this->interest_method=='declining balance')
            $schedule = $this->decliningBalanceDiscounted();
        if($this->interest_method=='amortized')
            $schedule = $this->decliningBalanceAmortized();
        return $schedule;
    }
    
    public function discountedTotalInterest() 
    {   
        $balance   = 0;
        $interest  = 0;
        $total_interest = 0;
        $balance   = $this->amount();
        for($this->i=1; $this->i<=$this->loanPeriod(); $this->i++){
            $interest = $balance*$this->interestRate();
            //$this->interest=(ceil($this->interest/100))*100;                        
            $balance -= $this->loanPrincipal();
            //$this->total_installments+=$this->installment;
            $total_interest += $interest;
        }
        return $this->total_interest;
    }

    public function discountedTotalLoanBalance() 
    {
        return $this->amount() + $this->discountedTotalInterest();
    }

    public function flat()
    {  
        /*if($int_type=='Fixed'){ 
           $totalInterest=($amount*$rate);       
           $interest=($amount*$rate)/$newPeriod;           
           }else{*/
        $period = $this->loanPeriod();
        $frequency = $this->frequency;
        $disbursement_date = $this->disbursement_date;
        $principal = $this->loanPrincipal();
        $interest=$this->amount() * $this->interestRate();
        $installment = $principal + $this->interest;
        $total_balance=$this->flatTotalLoanBalance(); 
        $payment = [];
        $schedule = [];

        for($i = 1; $i <= $period; $i++){
            $total_balance -= $installment;

            $due_date = $this->getDueDates($disbursement_date,$frequency);
            $disbursement_date = $due_date;
            $payment = [
                'installment_number' => $i,
                'due_date'     => (Carbon::parse($due_date))->format('d-m-Y'),
                'principal'    => $principal,
                'interest'     => $interest,
                'installment'  => $installment,
                'balance'      => $total_balance
            ];          
            array_push($schedule, $payment);
        }
            return $schedule;
    }

    public function decliningBalanceDiscounted()
    {   
        // $principal=(ceil($principal/100))*100;
        $total_balance = $this->discountedTotalLoanBalance();
        $balance = $this->amount();
        $principal = $this->loanPrincipal();
        $interest_rate = $this->interestRate();
        $period = $this->loanPeriod();
        $frequency = $this->frequency;
        $payment = [];
        $schedule = [];

        $disbursement_date = $this->disbursement_date;
            for($i = 1; $i <= $period; $i++){
            $interest = $balance * $interest_rate;
            //$this->interest=(ceil($this->interest/100))*100;
            $balance -= $principal;
            $installment = $principal + $interest;   
            $total_balance -= $installment;                      
            
            if($total_balance < 1)
            $total_balance = 0;

            $due_date = $this->getDueDates($disbursement_date,$frequency);
            $disbursement_date = $due_date; 
            $payment = [
                'installment_number' => $i,
                'due_date'     => (Carbon::parse($due_date))->format('d-m-Y'),
                'principal'    => $principal,
                'interest'     => $interest,
                'installment'  => $installment,
                'balance'      => $total_balance
            ];
            array_push($schedule, $payment);
        } 
            return $schedule;
    }

     public function decliningBalanceAmortized()
     {
        //$total_balance = $this->discountedTotalLoanBalance();
        //$balance = $this->amount();
       // $principal = $this->loanPrincipal();
        $interest_rate = $this->interestRate();
        $period = $this->loanPeriod();
        $frequency = $this->frequency;
        $n   = $period;
        $r   = $interest_rate;
        $p   = $this->amount();
        $payment = [];
        $schedule = [];

        for($i = 1; $i <= $period; $i++){
            $installment=(($p*r)*pow((1+$r),$n))/
                          (pow((1+$r),$n)-1);
            $interest=$balance*$interest_rate;
            //$this->interest=(ceil($this->interest/100))*100;                
            $principal = $installment-$interest;          
            $balance  -= $principal;
            $due_date = $this->getDueDates($disbursement_date,$frequency);
            $disbursement_date = $due_date; 
            $payment = [
                'installment_number' => $i,
                'due_date' => (Carbon::parse($due_date))->format('d-m-Y'),
                'principal'    => $principal,
                'interest'     => $interest,
                'installment'  => $installment,
                'balance'      => $installment  //compute total balance later
            ];
            array_push($schedule, $payment);
        }
            return $schedule;
     }
    
     public function getDueDates($disbursement_date,$frequency)
     {  
       if($frequency == 'monthly')
       $due_date = date('Y-m-d', 
                        strtotime('+1 month', strtotime($disbursement_date)));
       elseif($frequency == 'weekly')
       $due_date = date('Y-m-d', 
                        strtotime('+1 week', strtotime($disbursement_date)));
       elseif($frequency == 'biweekly')
       $due_date = date('Y-m-d', strtotime('+2 week', 
                        strtotime($disbursement_date)));
       elseif($frequency == 'quarterly')
       $due_date = date('Y-m-d', 
                        strtotime('+3 month', strtotime($disbursement_date)));
        return $due_date;
     }

     public function pmt($interest_rate, $repayment_period, $disbursed_amount)
    {
        $amount   = $interest_rate * - $disbursed_amount * pow((1 + $interest_rate), $repayment_period) / (1 - pow((1 + $interest_rate), $repayment_period));
        return $amount;
    }

   // https://www.vertex42.com/ExcelArticles/amortization-calculation.html)

    public function getFrequency($product)
    {  
        //return $product->payment_frequency;
        return 'monthly';
    }

    public function getInterestRate($product)
    {
        return $product->interest_rate;
    }

    public function getInterestMethod($product)
    {  
        //$loan_product = LoanProducts::find($product);
        
        //dd($product->interest_method);
        return $product->interest_method;
    }

    public function getPenaltyRate($product)
    {
        return $product->penalty_rate;
    }

    public function getGracePeriod($product)
    {
        return $product->grace_period;
    }

    public function customer()
    {      
        return $this->belongsTo(Customers::class);
    }

    public function loan_product()
    {
        return $this->belongsTo(LoanProducts::class);
    }

    public function payment()
    {   
        return $this->hasMany(Payments::class);
    }

    public function approve($loan_id)
    {
        $this->loan_id;
        return;
    }

    public function disburse($loan_id)
    {
        
    }

    public function reverse($loan_id)
    {}

    public function reject($loan_id)
    {}

    public function loan_attributes($loan_id)
    {
        
    }

    //could work for ageing report
    /*public function arrears()
    {   
        $principal_balance = $this->amount();
        $payments = $this->loan->payments()->get();
        $ledger = [];
        $frequency = $this->frequency;
        $disbursement_date = $this->disbursement_date;
        if($this->interest_method=='flat')
            $interest_balance = $this->flatTotalInterest();
            $schedule = $this->flat();
        if($this->interest_method=='declining')
            $interest_balance = $this->discountedTotalInterest();
            $schedule = $this->decliningBalanceDiscounted();

       
        foreach($payments as $payment){
            foreach($schedule as $installment){
            $due_date = (Carbon::parse($installment['due_date']))->format('Y-m-d')
            $penalty   = $payment->penalty_paid;
            $total_amount_paid  = $principal + $interest;
            $principal_balance -= $payment->principal_paid;
            $interest_balance  -= $payment->interest_paid;
            $total_balance      = $principal_balance + $interest_balance;
            //loan is in arrears when
            if(strtotime($payment->payment_date) > strtotime($due_date))
            { // scenario 1 paying late 
               // and paying less principal
                if($payment->principal_paid < $installment['principal'])
                $principal_arrears  = $installment['principal'] - $payment->principal_paid;
                //and paying more
                elseif($payment->principal_paid < $installment['principal'])
                $principal_arrears  = 0;
                //and paying exact principal
                else
                //interest
                if($payment->interest_paid < $installment['interest'])
                $interest_arreas    = $installment['interest'] - $payment->interest_paid;
                $interest_arreas = 0;
            }

            if(strtotime($payment->payment_date) > strtotime($due_date))
            { // scenario 2 paying early 
                //loan is in arrears// customer paid late
                if($payment->principal_paid < $installment['principal'])
                $principal_arrears  = $installment['principal'] - $payment->principal_paid;
                $principal_arrears  = 0;
                if($payment->interest_paid < $installment['interest'])
                $interest_arreas    = $installment['interest'] - $payment->interest_paid;
                $interest_arreas = 0;
            }

            if(strtotime($payment->payment_date) > strtotime($due_date))
            { // scenario 1 paying on due date
                //loan is in arrears// customer paid late
                if($payment->principal_paid < $installment['principal'])
                $principal_arrears  = $installment['principal'] - $payment->principal_paid;
                $principal_arrears  = 0;
                if($payment->interest_paid < $installment['interest'])
                $interest_arreas    = $installment['interest'] - $payment->interest_paid;
                $interest_arreas = 0;
            }
            //else
        }
        $allpayments = [
            'due_date' => (Carbon::parse($payment->due_date))->format('d-m-Y'),
            'principal_paid'    =>  $principal,
            'interest_paid'     =>  $interest,
            'penalty_paid'      =>  $penalty,
            'total_amount_paid' =>  $total_amount_paid,
            'principal_balance' =>  $principal_balance,
            'interest_balance'  =>  $interest_balance,
            'total_balance'     =>  $total_balance
            ,
        ];
        array_push($ledger, $allpayments);
        }
           return collect($ledger);
    }*/
}
