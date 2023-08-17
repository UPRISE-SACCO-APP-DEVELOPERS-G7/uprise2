<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Claim;
use App\Models\Deposits;
use Carbon\Carbon;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page, Request $request)
    {
      // elseif($page == 'maps'){
      //   $claims=Claim::all();
      //   return view("pages.claims", [
      //     'claims'=>$claims,
         
      //   ])
     // dd($page);
      

      if ($page == 'maps') {
          $claims = \App\Models\Claim::all(); 
          return view("pages.maps", ['claims' => $claims,]);
      }elseif($page == 'typography') {
        $deposits = Deposits::all(); 
        // dd($deposits);
        // $trial = $deposits[0]['created_at'];
        //$date = $model->created_at->toDateString();
       // $date = $model->created_at->date('Y-m-d');
       //$startDate = Carbon::create(2023, 8,8 );
       //$endDate = Carbon::create(2023, 8, 16);
       $sample = $this->sortMonths();
       echo json_encode($sample);

       $start_time = \Carbon\Carbon::parse('2023-08-08');
        $finish_time = \Carbon\Carbon::parse('2023-08-16');
        $result = $start_time->diffInDays($finish_time, false);
        $nows=new \DateTime();
       echo $nows->format('Y-m-d');
        $now = Carbon::now();

        // dd($nows);
        //echo $now; 
        //die();

    //    $result = $deposits[3]->created_at->toDateString() -$deposits[0]->created_at->toDateString();
      // dd($result);

      
        foreach($deposits as $depts){
            $date_from_db = \Carbon\Carbon::parse($depts->created_at->toDateString());
           //echo $date . '<br />';
        }
        die();
        
        return view("pages.typography", [
            'deposits' => $deposits,
        ]);
      }elseif($page == 'members'){
          $members=Member::all();
          return view("pages.members", [
            'members'=>$members,
            'message'=> ""
          ]);
        }else{
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}");
            }
            return abort(404);
        }
       
    }

   public function createMember(Request $request)
   {
    // dd($request);
    $member = Member::create([
        'username'=>$request->username,
        'password'=>$request->password,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'status'=>$request->status,
        'membership_type'=>$request->membership_type,
        'registration_number'=>$request->registration_number,
        'physical_address'=>$request->physical_address,
        'postal_address'=>$request->postal_address,
        ]);

    // return view("pages.members")->with("message",$member->username . " registered successfully");
    $members=Member::all();
    return view("pages.members", [
        "members" => $members,
        "message"=> $member->username . " registered successfully"
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
     $deposits = Deposits::all();
     //$months = ["January", "February", "March", "April", "May", "June", "July", "August","September", "October", "November", "December"];
     $months = [1,2,3,4,5,6,7,8,9,10,11,12];
     foreach($months as $month)
       {
          array_push($x, array('month'=>$month, 'total'=>0));
       }

     foreach($deposits as $value){
        $date = Carbon::parse($value->created_at);
        // array_push($m, $date->month );
        foreach($months as $month)
       {
          if($month == $date->month){
            $x[$month] = + 1;
          }
       }
       $date = 0;
     }

     return $x;
   }
}
