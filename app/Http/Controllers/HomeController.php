<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Loan;
use App\Models\Deposit;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        /**GET ALL DEPOSITS */
        $all_deposits = Deposit::all();
        $total_deposits = 0;
        $highest_deposits = 0;
        $total_loans =0;
        $highest_loan = 0;
        $loan_update = null;
        $deposit_update = null;
           /*Get Highest deposits */
        foreach ($all_deposits as $deposit)
        {
            $total_deposits = $total_deposits + $deposit->amount;
            $hold = $deposit->amount;
           /* get highest deposits using an if statemwnt */
            if($hold > $highest_deposits){
                $highest_deposits = $hold;
                $deposit_update = $deposit->updated_at;
            }
        }
        /* get highest loans*/
        $all_loans = Loan::all();
        foreach($all_loans as $loan){
            $total_loans = $total_loans + $loan-> amount;

            /* get highest loans*/
            $hold = $loan->amount;
            if($hold > $highest_loan){
                $highest_loan = $hold;
                /*update loan date */
                $loan_update = $loan->updated_at;
            }
        }
        /*get account balance which is total_amount - total_loans */
        $account_balance = $total_deposits - $total_loans;
     
        $data = [
            'name'  => 'Raphael',
            'user' => Auth::user(),
            'members' => Member::all()->count(),
            'loans' => Loan::all()->count(),
            'total_amount' => $total_deposits,
            'deposit_count' => Deposit::all()->count(),
            'highest_deposit' => $highest_deposits,
            'total_loans' => $total_loans,
            'highest_loan' => $highest_loan,
            'account_balance' =>$account_balance,
            "loan_update" => $loan_update,
            "deposit_update"=>$deposit_update
        ];
        return view('dashboard')->with($data);
        // return view('login');

    }
}
