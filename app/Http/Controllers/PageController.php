<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Claim;


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
      

      if ($page == 'maps') {
          $claims = \App\Models\Claim::all(); 
          return view("pages.maps", [
              'claims' => $claims,
          ]);
      }
      
        
        if($page == 'members'){
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
   
}
