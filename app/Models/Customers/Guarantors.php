<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Model;
use App\Models\Loans\LoanApplications;

class Guarantors extends Model
{
    protected $guarded = [];


    public function loan_application()
    {      
        return $this->belongsTo(LoanApplications::class,'loan_applications_id');
    }
}
