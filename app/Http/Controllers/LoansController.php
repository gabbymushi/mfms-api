<?php

namespace App\Http\Controllers;

use App\Models\Loan_transactions;
use App\Models\LoanInstallment;
use Illuminate\Http\Request;
use App\Models\Loans;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $member_id = $request->input('member_id');
        $loans = Loans::where(['member_id' => $member_id])->get();
        return response()->json($loans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $date_issued = $request->input('date_issued');
        $member_id = $request->input('member_id');
        $loan_duration = $request->input('loan_duration');
        $principal = $request->input('loan_principal');
        $duration_type = $request->input('duration_type');
        $return_duration_type = $request->input('return_duration_type');
        $return_duration = $request->input('return_duration');
        $loan_id = Loans::create($data)->id;
        $date = new \DateTime($date_issued);
        $date->modify('+' . $loan_duration . ' ' . $duration_type);
        $end_date = $date->format('Y-m-d');
        $date1 = date_create($date_issued);
        $date2 = date_create($end_date);
        $diff = date_diff($date1, $date2);
        // return response()->json($loan_id);
        $loan_principal = 0;
        $installments = 0;
        if ($return_duration_type == "day") {
            $date_diff = abs(strtotime($end_date) - strtotime($date_issued));
            $installments = floor($date_diff / (60 * 60 * 24) / $return_duration);
            $loan_principal = $principal / $installments;
        } elseif ($return_duration_type == "month") {
            $date_diff = abs(strtotime($end_date) - strtotime($date_issued));
            $installments = floor($date_diff / (30 * 60 * 60 * 24) / $return_duration);
            $loan_principal = $principal / $installments;
        } elseif ($return_duration_type == "year") {
            $date_diff = abs(strtotime($end_date) - strtotime($date_issued));
            $installments = floor($date_diff / (365 * 60 * 60 * 24) / $return_duration);
            $loan_principal = $principal / $installments;
        }
        return $this->createLoanInstallment($end_date, $installments, $date_issued, $return_duration, $return_duration_type, $loan_principal, $loan_id, $member_id);
    }

    private function createLoanInstallment($end_date, $installments, $date_issued, $return_duration, $return_duration_type, $loan_principal, $loan_id, $member_id)
    {
        $installment = (integer)$installments;
        //return response()->json($installments);
        for ($i = 0; $i < $installment; $i++) {
            $date = new \DateTime($date_issued);
            $date->modify('+' . $return_duration . ' ' . $return_duration_type);
            $date_issued = $date->format('Y-m-d');
            $installments = new LoanInstallment([
                'loan_id' => $loan_id,
                'member_id' => $member_id,
                'installment_principal' => $loan_principal,
                'installment_interest' => 00,
                'installment_date' => $date_issued
            ]);
            $installments->save();
        }
        return response()->json($end_date);
    }
    public function getLoanInstallments(Request $request,LoanInstallment $installment)
    {
        //$member_id = $request->input('member_id');
        $loan_id = $request->input('loan_id');
        $installments = $installment->getLoanInstallments($loan_id);
        return response()->json($installments);
    }
}
