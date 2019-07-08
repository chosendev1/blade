<?php 

namespace APP\Models\Payments


abstract class AbstractPayment
{
	
	public function amountPaid();
	public function principalPaid();
	public function interestPaid();
	public function amountInArrears();
	public function principalInArrears();
	public function interestInArrears();
	public function penaltyPaid();
	public function penaltyInArrears();


}
