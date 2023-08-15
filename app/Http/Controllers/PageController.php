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
        $loans = Loans::with('installments')->get(); 
        $loans = Loans::all();
        $pending = $accepted = $disapproved = $shortlisted = $approved = $rejected = 0;
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
                elseif($loan->request_status == "APPROVED"){
                    $approved++;
                }
                elseif($loan->request_status == "REJECTED"){
                    $rejected++;
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
                         'approved'=>$approved,
                         'activePage' => $page,
                         'rejected' => $rejected,
                         'activeButton' => 'laravel',
                         
                    );
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}")->with($data);
        }
        return abort(404);
    }

    public function magic(Request $request)
    
    {
        $id = $request->loan_id;
        $status = $request->loan_req;
        // dd($status);
        $loan = Loans::where('application_number', $id)->update(['request_status' => $status]);
        return redirect()->back();
    }
}
   
