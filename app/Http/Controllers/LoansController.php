<?php

namespace App\Http\Controllers;
use App\Model\Loans;

use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function loans()
    { 
        $loans = Loans::all();
        // dd($loans);
        // exit();
     
        return view("pages.loans")->with("loans",$loans);
    
    }
}
