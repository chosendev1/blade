<?php

namespace App\Models\Collaterals;

use Illuminate\Database\Eloquent\Model;
use App\Models\Loans\LoanApplication;

class Collateral extends Model
{
    protected $guarded = [];


    public function loan_application()
    {      
        return $this->belongsTo(LoanApplication::class,'loan_applications_id');
    }
}
