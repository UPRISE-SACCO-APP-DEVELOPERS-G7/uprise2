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
}
