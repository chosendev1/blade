<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Loans\LoanApplication;
use Carbon\Carbon;

class Payment extends Model implements PaymentInterface
{	
	use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $guarded = [];

	public $amountPaid;
	public $amountInArrears;
	public $interestPaid;
	public $interestInArrears;
	public $principalPaid;
	public $principalInArrears;
	public $penaltyPaid;
	public $penaltyInArrears;
	public $loan;

	function __constructor(LoanApplications $loan){

		$this->loan = $loan;
		$this->amountPaid = $this->totalAmountPaid();
		$this->amountInArrears = $this->amountInArrears();
		$this->interestPaid = $this->interestPaid();
		$this->interestInArrears = $this->interestInArrears();
		$this->principalPaid = $this->principalPaid();
		$this->principalInArrears = $this->principalInArrears();
		$this->penaltyPaid = $this->penaltyPaid();
		$this->penaltyInArrears = $this->penaltyInArrears();
	}

public function test()
{
	// dd($this);
}
    public function loan_application()
    {
        return $this->belongsTo(LoanApplication::class,'loan_application_id');
    }

    public function totalAmountPaid()
    {
    	return $this->amountPaid;
    }
    
	public function principalPaid()
	{
		return $this->principalPaid;
	}
	public function interestPaid()
	{
		return $this->interestPaid;
	}
	public function amountInArrears()
	{
		return $this->amountInArrears;
	}
	public function principalInArrears()
	{
		return $this->principalInArrears;
	}
	public function interestInArrears()
	{
		return $this->interestInArrears;
	}
	public function penaltyPaid()
	{
		return $this->penaltyPaid;
	}
	public function penaltyInArrears()
	{
		return $this->penaltyInArrears;
	}

	public function customer()
	{
 		// dd($this->loan);
	}

	public function customerName()
	{

	}
}
