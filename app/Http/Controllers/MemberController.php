<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
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
    public function store()
    {
    //     try {
    //         $member = Member::create([
    //             'title'=>"New member",
    //             'first_name'=>"Joan",
    //             'last_name'=>"Namutebi",
    //             'address'=>"Kamokya",
    //             'username'=>"Joo",
    //             'password'=>"fghhjjkk*",
    //             'phone'=>"0798543123",
    //             'email'=>"j@gmail.com",
    //             'loan_balance'=>"200,009",
    //             'deposit_balance'=>"786,908",
    //             'type'=>"Active"
    //         ]);
        
    //         return view('pages.loans');

    //     } catch (\Throwable $th) {
    //         dd($th);
    //         throw $th;
    //     }
    // }
     return view('pages.loans');
    
}

}
