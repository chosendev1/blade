<?php

namespace App\Models\Customers;

use App\Models\Company\Company;
use App\Models\Branches\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Loans\LoanApplications;

class Customer extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	protected $guarded = [];

	public function company()
    {      
        return $this->belongsTo(Company::class);
    }

    public function branch()
    {      
        return $this->belongsTo(Branch::class);
    }
}
