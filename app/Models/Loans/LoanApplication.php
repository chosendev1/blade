<?php

namespace App\Models\Loans;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Payments\Payment;
use App\Models\Customers\Customer;
use App\Models\Customers\Guarantor;
use App\Models\Loans\LoanProduct;
use App\Models\Loans\LoanDisbursement;
use App\Models\Loans\LoanApproval;
use App\Models\Loans\LoanAppraisal;
use App\Models\Branches\Branch;
use App\Models\Collaterals\Collateral;
use App\Models\Loans\Reports\LoanReports;
use Carbon\Carbon;

class LoanApplication extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    //protected $with = ['LoanProduct.loan_application'];
        
    public function customer()
    {      
        return $this->belongsTo(Customer::class);
    }

    public function loan_product()
    {
        return $this->belongsTo(LoanProduct::class);
    }

    public function guarantor()
    {
        return $this->hasMany(Guarantor::class);
    }

    public function collateral()
    {
        return $this->hasMany(Collateral::class);
    }

    public function payment()
    {   
        return $this->hasMany(Payment::class);
    }

    public function branch()
    {      
        return $this->belongsTo(Branch::class);
    }

    public function disbursement()
    {
        return $this->hasOne(LoanDisbursement::class,'loan_id');
    }

    public function appraisal()
    {
        return $this->hasOne(LoanAppraisal::class,'loan_id');
    }

    public function approval()
    {
        return $this->hasOne(LoanApproval::class,'loan_id');
    }

    public function approve($loan_id)
    {
        $this->loan_id;
        return;
    }

    public function disburse($loan_id)
    {}

    public function reverse($loan_id)
    {}

    public function reject($loan_id)
    {}

    public function loan_attributes($loan_id)
    {
        
    }
 
    public function schedule()
    {   
        $schedule = new Schedule($this,$this->loan_product);
        $schedule = $schedule->schedule();
        return $schedule;
    }

    public function loanLedger()
    {
        $loan_ledger = new LoanReports($this,$this->loan_product);
        $loan_ledger     = $loan_ledger->loanLedgerReport();
        return $loan_ledger;
    }

    public function loanOutstandingBalanceReport()
    {
        $loan_reports = new LoanReports($this,$this->loan_product);
        $balance      = $loan_reports->outstandingBalanceReport(Carbon::now());
        return $balance;
    }

    public function loanArrearsReport()
    {
        $arrears_report = new LoanReports($this,$this->loan_product);
        $arrears     = $arrears_report->arrearsReport(Carbon::now());
        return $arrears;
    }

    public function loanDuePaymentsReport()
    {
        $arrears_report = new LoanReports($this,$this->loan_product);
        $arrears     = $arrears_report->duePaymentsReport(Carbon::now());
        return $arrears;
    }
}
