<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Claim;
use App\Models\Deposit;
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