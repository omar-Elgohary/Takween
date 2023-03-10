<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $s= $request->update([
            'status'=>"Cancel by customer"
        ]);
        return redirect()->back()->with(['state'=>"cancel","id"=>$id]);
    }


    public function review($id)
    {
        $request=Requests::find($id);
        $s= $request->update([
            'status'=>"Cancel by customer"
        ]);
        return redirect()->back()->with(['state'=>"cancel","id"=>$id]);
    }
}

