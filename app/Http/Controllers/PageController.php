<?php

namespace App\Http\Controllers;
use App\Imports\DepositsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Claim;
use App\Models\Deposit;
use Carbon\Carbon;


use PDF;


class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page, Request $request)
    { 
        $installments = 12; // You can replace 12 with the actual number of installments
        $interest = 5;
        $totalAppliedAmount = Loan::sum('amount');
        $loans = Loan::with('installments')->get();
        $loans = Loan::with('installments')->get(); 
        $disbursedLoans = Loan::where('request_status', 'DISBURSED')->get();
        $approvedLoans = Loan::where('request_status', 'APPROVED')->get();
        $recoveredLoans = Loan::where('request_status', 'RECOVERED')->get();

        // dd($page);

    
        $members = Member::all();

        if($page == "generate-pdf"){
            // $loansPercentage = ($totalLoans > 0) ? (($approved / $totalLoans) * 100) : 0;
            $data = ['title' => 'My PDF Report'];
            $pdf = PDF::loadView('pages.notifications', $data);
            $pdf->setPaper('A4', 'portrait');
            return $pdf->download('report.pdf');
        } else{

                $loans = Loan::with('installments')->get();

                $loans = Loan::all();


                // return view('member')->with('members', $members);

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
                $interest = ($loan->interest_rate/100) * $loan -> amount;
                $totalSanctionedAmount = $approvedLoans->sum('amount');
                $disapprovedSum = Loan::where('request_status', 'DISAPPROVED')->sum('amount');
                
                
            
                // $amountPerInstallment = ($installments > 0) ? $totalAmountWithInterest / $iInstallments : 0;
                $data = array('loans' => $loans, 

                                'deposits'=> [],
                                'members' => $members,
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
                                'recoveredLoans' =>  $recoveredLoans,
                            
                                

                );

                if($page == "generate-pdf"){
                // dd($page);
                // die();
                    $data = ['title' => 'My PDF Report',  'loansPercentage' => 34];
                    $pdf = PDF::loadView('pages.notifications', $data); 
                    $pdf->setPaper('A4', 'portrait');
                    return $pdf->download('notifications.pdf');
                }
                if($page == 'members'){
                    $members=Member::all();
                    return view("pages.members", [
                    'members'=>$members,
                    'message'=> ""
                    ]);         
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

                
                if ($page == 'maps') {
                    $claims = \App\Models\Claim::all();
                    return view("pages.maps", ['claims' => $claims,]);
                }
                if($page == 'typography') {
                    $deposits = Deposit::all();
                    
                    $graphData = $this->sortMonths();
                    $realData = [];
                    foreach($graphData as $data){
                    array_push($realData, $data['total']);
                    }

                    return view("pages.typography", [
                        'deposits' => $deposits,
                        'realData'=>$realData
                    ]);
                }
                // if($page == 'members'){
                //     $members=Member::all();
                //     return view("pages.members", [
                //     'members'=>$members,
                //     'message'=> ""
                //     ]);
                // }

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
      // elseif($page == 'maps'){
      //   $claims=Claim::all();
      //   return view("pages.claims", [
      //     'claims'=>$claims,

      //   ])
     // dd($page);


    }

  

    

    // public function generatePdf()
    // {

    //     $data = ['title' => 'My PDF Report'];
    //     $pdf = PDF::loadView('pages.notifications', $data);
    //     $pdf->setPaper('A4', 'portrait');
    //     return $pdf->download('report.pdf');
    // }
   
    public function magic(Request $request)

    {
        $id = $request->loan_id;
        $status = $request->loan_req;
        // dd($status);
        $loan = Loan::where('application_number', $id)->update(['request_status' => $status]);
        return redirect()->back();
    }

    public function import(Request $request)
    {
       // dd("we are in");
        Excel::import(new DepositsImport,  $request->file('file')->store('temp'));

        return redirect()->back()->with('success', 'All good!');

    }

    public function createMember(Request $request)
   {
    // dd($request);
    $member = Member::create([
        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname,
        'email'=>$request->email,
        'password'=>$request->password,
        'phone'=>$request->phone,
        'title'=>$request->title,
        'address'=>$request->address,
       
        ]);

    // return view("pages.members")->with("message",$member->username . " registered successfully");
    $members=Member::all();
    return view("pages.members", [
        "members" => $members,
        "message"=> $member->lastname . " registered successfully"
    ]);

   }

    public function listMembers()
    {
        dd($page);
        $members=Member::all();
        return view("pages.members", [
          'members'=>$members,
          'message'=> ""

        ]);
        return view("pages.members");
    }
   public function dashboard()
   {
    return view("pages.dashboard");
   }

   public static function sortMonths()
   {

     $m = $x = array();
     $deposits = Deposit::all();
     //$months = ["January", "February", "March", "April", "May", "June", "July", "August","September", "October", "November", "December"];
     $months = [1,2,3,4,5,6,7,8,9,10,11,12];
     foreach($months as $month)
       {
          array_push($x, array('month'=>$month, 'total'=>0));
       }

     foreach($deposits as $value){
        $date = Carbon::parse($value->created_at)->format('m');
        // array_push($m, $date->month );
        //echo $date;
        $sum = 0;
        foreach($months as $month)
       {


        if($month == $date+0){
            $x[$month-1]['total'] = $x[$month-1]['total'] + $value->amount;
           // echo $x[$month-1]['total'];
        }
         // if($month == $date->month)
        //   foreach($x as $y){
        //     if($y['month'] == $date->month){
        //         $y['total'] = + 1;

        //       }
        //  }
       }

     }

    return $x;

  }
}
