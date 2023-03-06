<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;

class FreelancerRequestController extends Controller
{
    

    public function  getneworder(){
       $id=auth()->user()->id;
        $privates =  Requests::where('type','private')->where("status",'Pending')->where('freelancer_id',$id)->get();
        $publics=Requests::where('type','public')->where('status','Pending'
        )->whereNull('freelancer_id')->get();

        // dd($publics);
        return view('freelancer.neworder',compact('privates','publics'));
    }



    public function sendoffer(Request $request ,$id){
 
        $flag=false;
        $user_id=auth()->user()->id;
     $request->validate([
       'offer'=>['required'],
       'type'=>['required'],
     ]);

     if($request->type ==="request"){
        $order=Requests::find($id);
        $order->offer()->create([
         'type'=>"request",
          'freelancer_id'=>$user_id,
          'price'=>$request->offer,
          'status'=>'pending',
       
        ]);
      
        $flag=true;

     }elseif($request->type === "reservation"){


        $flag=true;
     }

    


if($flag){

    return redirect()->back()->with('message','offer is send');
}


    }
}
