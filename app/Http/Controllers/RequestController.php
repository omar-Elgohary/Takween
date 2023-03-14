<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Offer;
use App\Models\Review;
use App\Models\Category;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        // return view('user.requestpublicservice', compact('categories'));
    }



    public function requestUserToFreelancer($id)
    {
        $freelancer = User::find($id);
        $categories=Category::all();
        return view('user.requestprivateservice', compact('freelancer','categories'));
    }

    public function requestpublicservice(){

        $categories=Category::all();
        return view('user.requestpublicservice', compact('categories'));
    }

// store public and private  requests
    public function store(Request $request ,$freelancer_id=null)
    {
       
 
        $user_id= auth()->user()->id;
        $this->validate($request, [
            'category_id' => 'required',
            'service_id' => 'required',
            'title' => 'required|string',
            'attachment' => 'required',
            // 'attachment' => 'required|mimes:pdf,word',
            'description' => 'required',
            'due_date' => 'required|date',
            'type'=>[\Illuminate\Validation\Rule::in(['public','private'])]
        ],[
            'category_id.required' => 'Category is required',
            'service_id.required' => 'Service is required',
            'title.required' => 'Request Title is required',
            'title.mimes' => 'Request Title must be pdf',
            'attachment.required' => 'Request Attachment is required',
            'description.required' => 'Description is required',
            'due_date.required' => 'Due Date is required',
        ]);

       
        if($request->type=='public'){

           $re= Requests::create([
             'title'=>'title',
             'category_id'=>$request->category_id,
             'service_id'=>$request->service_id,
             'description'=>$request->description,
             'due_date'=>$request->due_date,
             'user_id'=>$user_id,
             'type'=>'public',
             
            ]);
           
            
         
        }elseif($request->type=='private'){
            $re= Requests::create([
             'title'=>'title',
             'category_id'=>$request->category_id,
             'service_id'=>$request->service_id,
             'description'=>$request->description,
             'due_date'=>$request->due_date,
             'freelancer_id'=>$freelancer_id,
             'type'=>'private',
            ]);

        
    

        }
       

      
        $name= explode(".",$request->file("attachment")->getCLientOriginalName())[0];
       $size=number_format($request->file("attachment")->getSize()/ 1024,2);
       $type=$request->file("attachment")->getCLientOriginalExtension();
        $file_extention = $request->file("attachment")->getCLientOriginalExtension();
        $attachment_name=time(). ".".$file_extention;
        $request->file("attachment")->move(public_path('front/upload/files/'),$attachment_name);
       
        $re->file()->create([
            'name'=> $name,
            'user_id'=>auth()->user()->id,
            'type'=>$type,
            'url'=> $attachment_name,
            'size'=>$size,
        ]);

        return  redirect()->back()->with( ['messsage' => 'ok'] );

    }


    public function getCategoryServices($id)
    {

        if(app()->getLocale()=='ar'){
            $services = DB::table("services")->where("category_id" , $id)->pluck("service_ar" , "id");
        }else{
            $services = DB::table("services")->where("category_id" , $id)->pluck("service_en" , "id");
        }
        
        return json_encode($services);
    }


    public function publicRequests()
    {
        $requests = Requests::where('type', 'public')->where("user_id", auth()->user()->id)->orderBy('status')->get();

        return view('user.showpublicrequest', compact('requests'));
    }


    public function privateRequests()
    {
        $requests = Requests::where('type', 'private')->where("user_id", auth()->user()->id)->orderBy('status')->get();
      

        return view('user.showprivaterequest', compact('requests'));
    }


    public function cancel($id)
    {
        $request=Requests::find($id);
        
        $total_pay=$request->payment()->where('freelancer_id',$request->freelancer_id)->first()->total;
        $edit_pay=$request->payment()->where('freelancer_id',$request->freelancer_id)->first()->update([
            'status'=>"refund"
        ]);

       $current_wallet= User::findOrFail(auth()->user()->id)->wallet->total;
        $current_wallet+= $total_pay;
        $edit_offer= Requests::findorfail($id)->offer()->where('freelancer_id',$request->freelancer_id)->update([
            "status"=>'reject',
        ]);
        $edit_request= $request->update([
            'status'=>"Cancel by customer"
        ]);

        $edit_wallet=User::findOrFail(auth()->user()->id)->wallet()->update([
            "total"=>$current_wallet
           ]);

        return redirect()->back()->with(['state'=>"cancel","id"=>$id,'command'=>'open review']);
    }


    public function review($id)
    {
        // $request=Requests::find($id);
        // $s= $request->update([
        //     'status'=>"Cancel by customer"
        // ]);
        // return redirect()->back()->with(['state'=>"cancel","id"=>$id]);
    }

    public function  getrequestoffer($id){

    $requests=Requests::findorfail($id);

     $requestsoffer=$requests->offer()->select('freelancer_id','price','id')->where('status','pending')->get();

$data="";
     foreach(  $requestsoffer  as $re){
    
       $data.=' <div class="freelanceroffer ">
        <div class=" d-flex "> 
            <div class="img">
        <img src="'.asset( 'Admin3/assets/images/users/'.User::findOrFail($re->freelancer_id)->profile_image).'" alt="">
            </div>

            <div class="info d-flex flex-column">
                <h5 class="mb-0">'. User::findOrFail($re->freelancer_id)->name  .'</h5>
                <p class="mb-0"><span style="font-weight:600" class="mb-0 ">'. $re->price .'</span> <span style="font-size:12px;color:#777">Rs</span>
                </p>

                <div class="d-flex">
                    <div class="d-flex align-items-baseline ">
                        <i class="fa-solid fa-star"></i>
                        <p class="mb-0">';
                        if(Review::select('rate')->where('freelancer_id',$re->freelancer_id)->count() > 0){
                            $data.=    Review::select('rate')->where('freelancer_id',$re->freelancer_id)->sum('rate')/  Review::select('rate')->where('freelancer_id',$re->freelancer_id)->count();
                    }else{
                        $data.=   Review::select('rate')->where('freelancer_id',$re->freelancer_id)->count();
                     }
                     
                     $data.= 
                     '</p>
                    </div>

                    <div class="d-flex align-items-baseline px-2">
                        <i class="fa-solid fa-clipboard-check align-items-baseline"></i>
                        <p class="mb-0">7</p>
                    </div>
                </div>
            </div>
        </div>

        <div class=" buttoncontainer d-flex align-items-around justify-content-around position-relative">
        <form  method="GET" class="reject'.$id.'" onsubmit="event.preventDefault();" >
        <input type="hidden" name="request_id" value="'.$id.'">
        <input type="hidden" name="freelancer_id" value="'.$re->freelancer_id.'">
        <input type="hidden"  name="_token" value='.csrf_token().'>
         
        <button class="btn rej rounded-pill px-3 py-2 " type="submit"> reject</button>
        </form>
       
       
        <form action="'. route("user.acceptoffertopay",[$re->id,$id]) .'" method="GET">
        <button class="btn accept rounded-pill px-3 py-2" >accept</button>
        </form>
        
        </div>
    </div>';
}
if(strlen($data)>0 and $data!=null){
    return JSON_encode( $data);

}else{
    if(app()->getLocale()=='ar'){

        $data="لا يوجد عروض متاحه";
    }else{

        $data="no offer";

    }

    
    
    return JSON_encode( $data);

     }

    

    }


    function rejectofferrequest(Request $request){
     $flag=false;
    // $request_id=$request->request_id;
    $request_id= request("request_id");
    $freelancer_id=request("freelancer_id");

    $requests=Requests::findOrFail($request_id);
     $requests->offer()->where('freelancer_id',$freelancer_id)->update([
    'status'=>'reject'
    ]);

    $flag=true;
     
    return JSON_encode($flag);
    }

   
    function acceptoffertopay($id ,$re){

       
       $offer_price= Offer::where('id',$id)->first()->price;

       $wallet=User::findOrFail(auth()->user()->id)->wallet->total;
      
       
       $pay_wallet=( $wallet>=$offer_price)?1:0;
    

    return redirect()->back()->with(['message'=>'open payment','offer_id'=>$id,'request_id'=>$re,'pay_wallet'=>$pay_wallet]);
    }

}
//onsubmit="event.preventDefault(); return rejectoffer(this)"

