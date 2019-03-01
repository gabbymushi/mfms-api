<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  DB;

class LoanInstallment extends Model
{
    protected $primaryKey = 'installment_id';
    protected $fillable = [
        'loan_id', 'member_id', 'installment_principal','installment_interest','installment_date','organization_id'
    ];
    public function getLoanInstallments($loan_id){
        $installments = DB::table('loan_installments AS li')
           // ->join('tbl_company_employee AS ce', 'ce.employee_id', '=', 'em.employee_id')
            ->select('*')
            ->where('loan_id', '=', $loan_id)
            ->get();
        return $installments;
    }
}
