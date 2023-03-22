<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Requests;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index($freelancer_id)
    {
        $freelancer = User::find($freelancer_id);
        return view('user.requestreservation', compact('freelancer'));
    }


    public function store(Request $request, $freelancer_id)
    {
        $request->validate([
            'occasion' => 'required',
            'date_time' => 'required',
            'from' => 'required',
            'to' => 'required',
            'location' => 'nullable',
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,6));
        while(Reservation::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,6));
        }

        
        $data = $request->only('occasion', 'date_time', 'from', 'to', 'location');
        $data['user_id'] = Auth::User()->id;
        $data['freelancer_id'] = $request->freelancer_id;
        $data['random_id']=$random_id;

        Reservation::create($data);
        return redirect()->route('user.reservations');
    }



    public function show(Request $request)
    {
        $user_id = auth()->user()->id;
        $reservations = Reservation::where('user_id', $user_id)->orderBy('status')->get();
        return view('user.showreservation', compact('reservations'));
    }



    public function freelancerReservations(Request $request)
    {
        $freelancer_id = auth()->user()->id;
        $reservations = Reservation::where('freelancer_id', $freelancer_id)->get();
        return view("freelancer.showreservation", compact('reservations'));
    }


    
    public function changeStatus(Request $request , $id)
    {
        $reservation = Reservation::find($id);
        Reservation::where('id' , $id)->update(['status' => $request->status]);
        return back();
    }

    public function cancel($id)
    {
        $request=Reservation::find($id);

         if($request->payment()->where('freelancer_id',$request->freelancer_id)->first()){
        
        $total_pay=$request->payment()->where('freelancer_id',$request->freelancer_id)->first()->total;
        $edit_pay=$request->payment()->where('freelancer_id',$request->freelancer_id)->first()->update([
            'status'=>"refund"
        ]);

       $current_wallet= User::findOrFail(auth()->user()->id)->wallet->total;
        $current_wallet+= $total_pay;
        $edit_offer= Reservation::findorfail($id)->offer()->where('freelancer_id',$request->freelancer_id)->update([
            "status"=>'reject',
        ]);
    }
        $edit_request= $request->update([
            'status'=>"Cancel by customer"
        ]);
        return redirect()->back()->with(['state'=>"canceledInfirst","id"=>$id]);
    }


public function reservationPay(Request $request, $id){
$reservation=Reservation::findOrFail($id);
$offer_total=$reservation->offer->first()->price;
$payed =false;
if($request->paytype=='wallet'){
    $payed = PaymentController::walletpay2($offer_total);
  
   }elseif($request->paytype=='visa'){

      
   }elseif($request->paytype=='apay'){


   }else{

   }


   if($payed){

     $reservation->offer()->first()->update([
        "status"=>'active',
    ]);
   
    $reservation->update([
       
        'status'=>"Waiting"
    ]);
    $reservation->payment()->create([
     'user_id'=>auth()->user()->id,
     'freelancer_id'=>$reservation->freelancer_id,
     "status"=>'pending',
     "pay_type"=>'wallet',
     "total"=>$offer_total,

    ]);
    return redirect()->back()->with(['state'=>"paydone","id"=>$id]);
   }

   toastr()->error('something went wronge');
   return redirect()->back();

}




    // freelancer 



    public function rejectReservation($id){


       $re= Reservation::findOrFail($id);
       $re->update([
        'status'=>'reject',
       ]);

  return redirect()->back()->with(['state'=>"rejected","id"=>$id]);

    }



    


    // send offer for reesrvation from freelancer
    public function sendoffer(Request $request ,$id){
 
        $user_id=auth()->user()->id;
       $request->validate([
       'offer'=>['required'],
       
        ]);
        $order=Reservation::find($id);
        $order->offer()->create([
         'type'=>"reservation",
          'freelancer_id'=>$user_id,
          'price'=>$request->offer,
          'status'=>'pending',
       
        ]);
      
        toastr()->success('offer is send');

    return redirect()->back()->with(['state'=>"offersend","id"=>$id]);




    }
}
