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





    public function getmywork(){
        $user_id=auth()->user()->id; 

        $privates= Requests::where();

        // $privates= $privatesw->offer->get();
//         $privates = Requests::where('type','private')->where(function($q){
// $q->where('status','Pending')->orWhere('status','In process')->orWhere('status','Finished')->orWhere('status','Completed');
//         })->where('freelancer_id',$user_id)->offer->chunck();

// $privates = Requests::select('requests.*')->leftJoin('offers', function($q) use($user_id) {
//     $q->on('offers.offersable_id', '=', 'requests.id');
//     $q->where('offers.offersable_type', '=', 'App\Models\Requests');
//     // $q->where('offers.status','=','pending');
//     // $q->orWhere('offers.status','=','active');
//     $q->where('requests.status','=','public');
//     // $q->orWhere('requests.status','=','private');
//     // $q->where('requests.freelancer_id','=',$user_id);
//     // $q->orWhere('requests.freelancer_id','=','null');
    
// })->get();



        // $publics=Requests::where('type','public')->where(function($q){
        //     $q->where('status','Pending')->orWhere('status','In process')->orWhere('status','Finished')->orWhere('status','Completed');
        //             })->get();

         dd($privates);
        return view('freelancer.mywork',compact('privates'));
    }
}
