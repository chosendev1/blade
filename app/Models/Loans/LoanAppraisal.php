<?php

namespace App\Models\Loans;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loans\LoanApplication;

class LoanAppraisal extends Model
{
    // use SoftDeletes;
    
    // protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function loan_application()
    {
        return $this->belongsTo(LoanApplication::class,'loan_id');
    }

}
