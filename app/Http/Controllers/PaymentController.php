<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Requests;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function walletpay( Request $request){

       
        $offer_id=$request->offer;
        $request_id=$request->request_id;
        $offer_price= Offer::where('id',$offer_id)->first()->price;
        $freelancer_id= Offer::where('id',$offer_id)->first()->freelancer_id;
        
        
        if($this->getuserwallet()>=$offer_price){
         $total_wallet_after_pay=$this->getuserwallet()-$offer_price;
       $edit_offer= Requests::findorfail($request_id)->offer()->where('id',$offer_id)->update([
            "status"=>'active',
        ]);
        $edit_other_offer=Requests::findorfail($request_id)->offer()->where('id',"!=",$offer_id)->update([
            "status"=>'reject',
        ]);


        $edit_request=Requests::findorfail($request_id)->update([
            'freelancer_id'=>$freelancer_id,
            'status'=>"In Process"
        ]);
        $edit_pay =Requests::findorfail($request_id)->payment()->create([
         'user_id'=>auth()->user()->id,
         'freelancer_id'=>$freelancer_id,
         "status"=>'purchase',
         "pay_type"=>'wallet',
         "total"=>$offer_price,

        ]);
      
           $edit_wallet=User::findOrFail(auth()->user()->id)->wallet()->update([
            "total"=>$total_wallet_after_pay
           ]);

        if( $edit_offer && $edit_request && $edit_pay &&$edit_wallet ){
  


            return redirect()->back()->with(["message"=>'paydone']);

        }else{
            dd("therea are rong");
            
            return redirect()->back()->with(["message"=> "payfail",'content'=>'some thing went wrong']);
        }
   
        }else{
          
            return redirect()->back()->with(["message"=> "payfail",'content'=>'money not enough']);

        }
        


        
    }


    static function bankpay(){
        
    }

    static function apay(){
        
    }


    static function walletpay2($total){
   
        if(SELF::getuserwallet()>=$total){
            $total_wallet_after_pay=SELF::getuserwallet() - $total;
            $edit_wallet=User::findOrFail(auth()->user()->id)->wallet()->update([
                "total"=>$total_wallet_after_pay,
               ]);


               return true;
        }
       
            return false;
        
    }

   static function getuserwallet(){
      
       return User::findOrFail(auth()->user()->id)->wallet->total;
    }

 
}
