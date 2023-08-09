<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loans;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $loans = Loans::all();
        $pending = $accepted = $disapproved = $shortlisted = 0;
        foreach($loans as $loan){
                if($loan->request_status == "ACCEPTED"){
                    $accepted++;
                }
                elseif($loan->request_status == "PENDING"){
                    $pending++;
                }
                elseif($loan->request_status == "SHORTLISTED"){
                    $shortlisted++;
                }
                else{
                    $disapproved++;   
                }
        }
        $data = array('loans' => $loans, 
                        'deposits'=> [],
                         'pending'=>$pending, 
                         'accepted'=>$accepted, 
                         'shortlisted'=>$shortlisted,
                         'disapproved'=>$disapproved,
                    );
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}")->with($data);
        }
        return abort(404);
    }

   
}
