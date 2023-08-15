<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function loans()
    {
        $loans = Loans::all(); 
       
        return view('pages.loan', compact($loans)); 
    }

    public function magic(Request $request)
    
    {
        $id = $request->input('loan_id');
        $loan = Loans::find($id);
        var_dump($loan);
        return redirect()->back();
    }
}
