<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Loans\LoanApplication;

class Customers extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	protected $guarded = [];
   
    public function loan_application()
    {   
   		return $this->hasMany(LoanApplication::class);
    }

    public function loan_application()
    {   
   		return $this->hasMany(LoanApplication::class');
    }

}

