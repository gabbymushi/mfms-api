<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $fillable = ['member_id','loan_principal','loan_interest','loan_fee','loan_insurance',
        'loan_duration','date_issued','organization_id'];
}
