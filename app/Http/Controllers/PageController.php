<?php

namespace App\Http\Controllers;
use App\Imports\DepositsImport;
use Maatwebsite\Excel\Facades\Excel;
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
        // dd($page);
        if($page == "generate-pdf"){

            $data = ['title' => 'My PDF Report'];
        $pdf = PDF::loadView('pages.notifications', $data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('report.pdf');
        }else{

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
        $totalLoans = $pending + $accepted + $shortlisted + $disapproved + $approved + $rejected;
        $loansPercentage = ($totalLoans > 0) ? (($approved / $totalLoans) * 100) : 0;
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

                    );
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}")->with($data);
        }
        return abort(404);
    }

    }

    public function magic(Request $request)

    {
        $id = $request->loan_id;
        $status = $request->loan_req;
        // dd($status);
        $loan = Loans::where('application_number', $id)->update(['request_status' => $status]);
        return redirect()->back();
    }
    // public function generatePdf()
    // {

    //     $data = ['title' => 'My PDF Report'];
    //     $pdf = PDF::loadView('pages.notifications', $data);
    //     $pdf->setPaper('A4', 'portrait');
    //     return $pdf->download('report.pdf');
    // }

    public function import(Request $request)
    {
       // dd("we are in");
        Excel::import(new DepositsImport,  $request->file('file')->store('temp'));

        return redirect()->back()->with('success', 'All good!');
    }
}