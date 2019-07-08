<?php 

namespace APP\Models\Payments;


interface PaymentInterface
{
	
	public function totalAmountPaid();
	public function principalPaid();
	public function interestPaid();
	public function amountInArrears();
	public function principalInArrears();
	public function interestInArrears();
	public function penaltyPaid();
	public function penaltyInArrears();


}
