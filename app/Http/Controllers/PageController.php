<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loans;
use PDF;


class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
       
        $installments = 12; // You can replace 12 with the actual number of installments
        $interest = 5;
        $totalAppliedAmount = Loans::sum('amount');
        $loans = Loans::with('installments')->get();
        $loans = Loans::with('installments')->get(); 
        $disbursedLoans = Loans::where('request_status', 'DISBURSED')->get();
        $approvedLoans = Loans::where('request_status', 'APPROVED')->get();
        $recoveredLoans = Loans::where('request_status', 'RECOVERED')->get();

        $loans = Loans::all();
        $pending = $accepted = $disapproved = $shortlisted = $approved = $rejected = 0;

        foreach($loans as $loan){
                if($loan->request_status == "ACCEPTED"){
                    $accepted++;
                }
                elseif($loan->request_status == "PENDING"){
                    $pending++;
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
        $totalLoans = $pending + $accepted + $shortlisted + $disapproved + $approved + $rejected;
        $loansPercentage = ($totalLoans > 0) ? (($approved / $totalLoans) * 100) : 0;
        $shortlisted = $approved + $disapproved;
        $interest = $loan-> interest * $loan -> amount;
        $totalAmountWithInterest = $loan -> amount + $interest;
        $totalSanctionedAmount = $approvedLoans->sum('amount');
        $disapprovedSum = Loans::where('request_status', 'DISAPPROVED')->sum('amount');
        
        
       
        // $amountPerInstallment = ($installments > 0) ? $totalAmountWithInterest / $iInstallments : 0;
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
                         'loansPercentage' => $loansPercentage,
                         'installments' => $installments,
                         'interest' => $interest,
                         'totalAppliedAmount' => $totalAppliedAmount,
                         'totalSanctionedAmount' =>   $totalSanctionedAmount,
                         'approvedLoans' => $approvedLoans,
                         'disapprovedSum' =>  $disapprovedSum,
                         'disbursedLoans' => $disbursedLoans,
                         'recoveredLoans' =>  $recoveredLoans
                         
                    );

        if($page == "generate-pdf"){
        // dd($page);
        // die();
            $data = ['title' => 'My PDF Report',  'loansPercentage' => 34];
            $pdf = PDF::loadView('pages.notifications', $data); 
            $pdf->setPaper('A4', 'portrait');
            return $pdf->download('notifications.pdf');
        }
        if($page == "loans-in-progress"){
            // dd($data);

            return view('pages.progress')-> with($data);
        }
        if($page=='delinquent-loans'){
            // return view('pages.delinquent', [ 'activePage' => $page,]);
            return view('pages.delinquent')->with($data);

        }
        if($page=='default-loans'){
            return view('pages.default')->with($data);
        }
        if($page=='cleared-loans'){
            return view('pages.cleared')->with($data);
        }

        //     $data = ['title' => 'My PDF Report'];
        // $pdf = PDF::loadView('pages.notifications', $data); 
        // $pdf->setPaper('A4', 'portrait');
        // return $pdf->download('notifications.pdf');
        // }else
        

       
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
    
    public function generatePdf()
    {
        
        $data = ['title' => 'My PDF Report'];
        $pdf = PDF::loadView('pages.notifications', $data); 
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('notifications.pdf');
    }
   
    public function loansInProgress()
    {
        // Logic to retrieve and display loans in progress
    }

    public function delinquentLoans()
    {
        // Logic to retrieve and display delinquent loans
    }

    public function defaultLoans()
    {
        // Logic to retrieve and display default loans
    }
}
   
