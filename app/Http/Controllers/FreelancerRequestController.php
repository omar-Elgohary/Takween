<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;

class FreelancerRequestController extends Controller
{
    

    public function  getneworder(){
       $user_id=auth()->user()->id;
       $privates=[];
       $publics=[];


        $privatesx =  Requests::where('type','private')->where("status",'Pending')->where('freelancer_id',$user_id)->get();



        foreach(  $privatesx  as $p){

            if($p->type =='private' && $p->status =='Pending' && $p->offer->where('freelancer_id',$user_id)->first()!=null){
                
                if($p->type =='private' && $p->status =='Pending' && in_array($p->offer->where('freelancer_id',$user_id)->first()->status,['accept','pending'])){
                    continue;
                }
              

         } 
        
            array_push($privates,$p);
        }
        $publicsx=Requests::where('type','public')->where('status','Pending'
        )->whereNull('freelancer_id')->get();


        foreach( $publicsx as $p){
           
            if($p->type =='public' && $p->status =='Pending' && $p->offer->where('freelancer_id',$user_id)->first()!=null){
                if($p->type =='public' && $p->status =='Pending' && in_array($p->offer->where('freelancer_id',$user_id)->first()->status,['accept','pending'])){
                    continue;

                }
                if($p->type =='public' && $p->status =='Pending' &&$p->blacklist()->exists() && $user_id==$p->blacklist()->get()->freelancer_id){

                 
                    continue;

                }
               

              

         } 

            array_push($publics,$p);
        }

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

        $privates= Requests::where(function($q)use( $user_id){
           $q->where('freelancer_id',$user_id)->orWhere('freelancer_id',null);
        })->orderBy('status')->get();

        $result=[];


        foreach(  $privates as $p){

            if( $p->status =='Pending' && $p->offer->where('freelancer_id',$user_id)->first()==null){

                continue;

         } elseif( $p->status =='Pending' && in_array($p->offer->where('freelancer_id',$user_id)->first()->status,['reject'])){
            continue;

            }

            array_push($result,$p);
        }
     


   



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

        //  dd($privates);
        return view('freelancer.mywork',compact('result'));
    }



    function finishRequest($id){


        Requests::findorfail($id)->update([
          "status"=>"Finished",
          
        ]);
        return  redirect()->back()->with(['message'=>"request udate finished"]);
    }
}
