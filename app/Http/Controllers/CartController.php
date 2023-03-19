<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartadditems=[];
        $total=0;
        $price=0;
        $descount=0;
    if(Cart::where('user_id',auth()->user()->id)->exists()){

        $cartadditems= Cart::where('user_id',auth()->user()->id)->get();
        foreach($cartadditems as $item){

            $price+=$item->price;
        }

            $total=$price-$descount;

    }
       
        


        return view('user.chart',compact('cartadditems','total','descount','price'));
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
        
                $Photo= Photo::findorfail($id);
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
        
          $request->code;
         
          
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


    
}
