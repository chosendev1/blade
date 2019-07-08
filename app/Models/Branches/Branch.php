<?php

namespace App\Models\Branches;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loans\LoanApplication;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	protected $guarded = [];

	public function company()
    {      
        return $this->belongsTo(Company::class);
    }

    public function loan_application()
    {      
        return $this->hasMany(LoanApplication::class);
    }
}
