<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Discount;
use App\Models\CardOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\payment\HayperpayController;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($discount= null)
    {
        $cartadditems=[];
        $total=0;
        $price=0;
        $descount=0;
        $walletEnough=false;

        if (request('id') && request('resourcePath')) {
            $Hp = new HayperpayController();
$payment_status =$Hp->getPaymentStatus(request('id'), request('resourcePath'));

 $re = new  Request;
 $re->paytype='visa';
 $re->payment_status=$payment_status;
$this->cartpay($re);
}
    if(Cart::where('user_id',auth()->user()->id)->exists()){

        $cartadditems= Cart::where('user_id',auth()->user()->id)->get();
        foreach($cartadditems as $item){
        $price+=$item->price;
        }

        
        if ($discount) {
            $descount = $discount->value;
            if($discount->by =="%"){
            
            $total= $price - ( $price * $descount)/100;


        }elseif($discount->by =="$"){
          
            $total=$price-$descount;
            }

            $discount_key=$discount->key;

            if(PaymentController::getuserwallet()  >=$total){
            $walletEnough=true ;
            }

 return view('user.chart',compact('cartadditems','total','descount','price','discount_key' ,'walletEnough'));

        }else{


            $total=$price-$descount;

           if(PaymentController::getuserwallet() >= $total){
            $walletEnough=true ;
           }
         
        }

        

      

    }
       
        


        return view('user.chart',compact('cartadditems','total','descount','price','walletEnough'));
    }



    
    public function addToCart($id){
     
        $flag=false;
                if( ! Cart::where('type',request()->type)->where('user_id',auth()->user()->id)->where('cartsable_id',$id)->exists()){
        
              if(request()->type =='product'){
                  $product= Product::findorfail($id);
              $img='';
               foreach(array($product->img1,$product->img2,$product->img3) as $image){
                if($image!=null){
                  $img =$image;  
                  break;
                }
               }
                  $product->carts()->create([
                    'name'=>$product->name, 
                    'user_id'=>auth()->user()->id, 
                    'price'=>$product->price, 
                    'image'=>$img, 
                    'type'=>"product", 
                     
                  ]);
                  $flag=true;
                  return json_encode(["status"=>$flag,"message"=>__('translate.add to cart')],true);
        
              }else{
        
                $photo= Photo::findorfail($id);
                    $photo->carts()->create([
                      'name'=>$photo->name, 
                      'user_id'=>auth()->user()->id, 
                      'price'=>$photo->price, 
                      'image'=>$photo->photo, 
                      'type'=>"photo", 
                       
                    ]);
                    $flag=true;
                    return json_encode(["status"=>$flag,"message"=>__('translate.add to cart')],true);
              }
        
        
            }else{
                // toastr()->warning(__('translate.already add cart'));
                json_encode(["status"=>$flag,"message"=>__('translate.already add cart')],true);
            }
        
        
        }
        
        public function addPromoCode( Request $request ){
        
            $discount=null;
            if(Discount::where('key',$request->code)->exists()){
                   
                  
                $discount=Discount::where('key',$request->code)->first();
                
            Session::put('discount_key',$request->code);
             
            
      

            }else{

                toastr()->error('promo code not work');
            }
          

            return $this->index($discount);

        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Cart::findOrFail($id)->exists()){
            
            cart::find($id)->delete();
            toastr()->success(__('translate.delete from cart'));
            return redirect()->route('user.cart.index');
    
        }else{
            toastr()->error(__('translate.fail delete from cart'));
            return redirect()->route('user.cart.index');
        }
    }



    public function cartpay(Request $request){
    $paydata=[];
    $payed=false;
    $discount=null;
    $discount_id=null;
    $visa_pay_id=null;
    $disvalue=0;
    if(Cart::where('user_id',auth()->user()->id)->exists()){

        if(Discount::where('key',$request->disc)->exists()){
            $discount=Discount::where('key',$request->disc)->first();
            $discount_id=$discount->id;
            $disvalue=$discount->value.$discount->by;
        }

        if(Session::has('discount_key')){
            $discount=Discount::where('key',Session::get('discount_key'))->first();
            $discount_id=$discount->id;
            $disvalue=$discount->value.$discount->by;
        }
        $paydata=$this->calcCartTotal($discount);


     if($request->paytype=='wallet'){
      $payed = PaymentController::walletpay2($paydata['total']);
    
     }elseif($request->paytype=='visa'){


        $visa_pay_id=$request->payment_status['id'];
        
     $payed=true;
            

 

     }elseif($request->paytype=='apay'){


     }else{

     }


     if($payed){

        if($discount_id){

            $count= Discount::where('id',$discount_id)->select('count_use')->get();
             
            Discount::where('id',$discount_id)->update([
             'count_use'=> ++$count,
            ]);
         
            Discount::where('id',$discount_id)->userused()->create([
             'user_id'=>auth()->user()->id,   
            ]);
         
             }

       $order= CardOrder::create([
       'user_id'=>auth()->user()->id,
       'price'=>$paydata['price'],
       'discount_id'=> $discount_id,
       'total'=>$paydata['total'],
        ]);
    foreach($paydata['cartadditems'] as $data ){
       $item= $data->cartsable;
     
 
      $item->sells()->create([
       "user_id"=>auth()->user()->id,
       "type"=>$data->type,
       'price'=>$data->price,
       'card_order_id'=>$order->id
        ]);

       $tot= User::findOrFail($item->freelancer_id)->wallet->total ;
       $tot+= $data->price;
        User::findOrfail($item->freelancer_id)->wallet()->update([
            "total"=> $tot,
           ]);
      
     }

     $order->payment()->create([
        'user_id'=>auth()->user()->id,
        'pay_type'=>'bank',
        "status"=>'purchase',
        'total'=>$paydata['total'],
        'discount'=>$disvalue,
        'visapay_id'=>$visa_pay_id,

    ]);


    if($discount_id){

   $count= Discount::where('id',$discount_id)->select('count_use')->get();
    
   Discount::where('id',$discount_id)->update([
    'count_use'=> ++$count,
   ]);

   Discount::where('id',$discount_id)->userused()->create([
    'user_id'=>auth()->user()->id,   
   ]);

    }
   
    
   


     Cart::where('user_id',auth()->user()->id)->delete();

  




   
    
    } 

    return redirect()->route('user.cart.index')->with(['state'=>"paydone"]);
}
       toastr()->error('you dont have product in cart');
        return redirect()->back();
       
    }




    public function calcCartTotal($discount=null){
        $total=0;
        $price=0;
        $descount=0;
        $walletEnough=false;
          $cartadditems= Cart::where('user_id',auth()->user()->id)->get();
        foreach($cartadditems as $item){
            $price+=$item->price;
        }

        if ($discount) {

            $descount = $discount->value;
            if($discount->by =="%"){
            
            $total= $price - ( $price * $descount)/100;


        }elseif($discount->by =="$"){
          
            $total=$price-$descount;
            }

            $discount_key=$discount->key;

            if(PaymentController::getuserwallet()  >=$total){
            $walletEnough=true ;
            }


            return compact('cartadditems','total','descount','price','discount_key' ,'walletEnough');
        }else{

            $total=$price-$descount;

           if(PaymentController::getuserwallet()  >=$total){
            $walletEnough=true ;
           }
         
        }

   
   return compact('cartadditems','total','descount','price','walletEnough');
    }
 
    


   
  public function getHayperpayVisaId(){

    $discount=null;
    if(Session::has('discount_key')){
        $discount=Discount::where('key',$request->disc)->first();
    }
   
  $data =$this->calcCartTotal($discount);
    $Hp = new HayperpayController();

 $num=number_format($data['total'], 2, '.', '');
  $res= $Hp->checkout($num);
  
   


   $view = view('layouts.payment.hayperpay')->with(['responseData' => $res ])
   ->renderSections();

return response()->json([
   'status' => true,
   'content' => $view['main']
]);
  }
}
