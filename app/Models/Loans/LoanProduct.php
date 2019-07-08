<?php

namespace App\Models\Loans;

use App\Models\Company\Company;
use App\Models\Loans\LoanApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanProduct extends Model
{
	use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $guarded = []; 

   	public function loan_application()
    {   
   		return $this->hasMany(LoanApplication::class);
    }

    public function company()
    {      
        return $this->belongsTo(Company::class);
    }

    /*public function getInterestMethod()
    {  

    	//return $this->product_name;
    	$p=new LoanProducts;
    	return $p->pluck('product_name');
    }*/
}
