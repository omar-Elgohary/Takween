<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type', 'customer')->get();
        return view('Admin.users.index', compact('users'));
    }



    public function allFreelancers()
    {
        $freelancers = User::where('type', 'freelancer')->get();
        return view("visitor.freelancers", compact('freelancers'));
    }


    public function FreelancerProfile(Request $request, $id)
    {
        $freelancer = User::find($id);
        $products = Product::where('freelancer_id' , $id)->get();
        $photos = Photo::where('freelancer_id' , $id)->get();
        // return view('visitor.freelancer', compact('freelancer', 'products', 'photos'));
        return view('freelancer.profile', compact('freelancer', 'products', 'photos'));
    }


    public function destroy(Request $request, $id)
    {
        User::find($id)->delete();
        session()->flash('Delete' , 'تم حذف المستخدم بنجاج');
        return back();
    }


    public function updateUserProfile(Request $request, $id)
    {
        $request->validate([
            'profile_image' => 'image',
            'name' => 'required|string',
            'phone' => ['required','min:10', \Illuminate\Validation\Rule::unique('users')->ignore(auth()->user()->id)],
            'email'=> ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore(auth()->user()->id)],
        ]);

        $photo_name=User::findOrFail($id)->profile_image;
        if($request->hasFile('profile_image')){
            if($photo_name!="default.png"){
            File::delete('Admin3/assets/images/users/'.$photo_name);
            }
            $file_extention=$request->file('profile_image')->getCLientOriginalExtension();
            $photo_name=time(). ".".$file_extention;
            $request->file('profile_image')->move(public_path('Admin3/assets/images/users'),$photo_name);
        }

        User::find($id)->update([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "email"=>$request->email,
            "profile_image"=>$photo_name,
        ]);

        return back();
    }


    public function updateFreelancerProfile(Request $request, $id)
    {
        $request->validate([
            'profile_image' => 'image',
            'name' => 'required|string',
            'phone' => ['required','min:10', \Illuminate\Validation\Rule::unique('users')->ignore(auth()->user()->id)],
            'email'=> ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore(auth()->user()->id)],
            'bio' => 'required',
            'id_number' => ['required', \Illuminate\Validation\Rule::unique('users')->ignore(auth()->user()->id)],
            'business_register' => ['required', \Illuminate\Validation\Rule::unique('users')->ignore(auth()->user()->id)],
        ]);

        $photo_name=User::findOrFail($id)->profile_image;
        if($request->hasFile('profile_image')){
            if($photo_name!="default.png"){
                File::delete('Admin3/assets/images/users/'.$photo_name);
            }
            $file_extention=$request->file('profile_image')->getCLientOriginalExtension();
            $photo_name=time(). ".".$file_extention;
            $request->file('profile_image')->move(public_path('Admin3/assets/images/users'),$photo_name);
        }

        $user= User::find($id)->update([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "email"=>$request->email,
            "profile_image"=>$photo_name,
            "id_number"=>$request->id_number,
            "bio"=>$request->bio,
            "business_register"=>$request->business_register,
        ]);

        return redirect()->back()->with("message","profile update sucessfully");
    }


    public function addorremovelikes($id){

      $type=request("type");
      $flag=false;
      $action="append";
         if($type=="product"){
          $product =Product::findOrFail($id);
          if($product->likes->count()==0){
            $product->likes()->create([
                "user_id" => auth()->user()->id,
                "type"=> $type,
            ]);
            $action="add";
        }else{
            $product->likes()->where("user_id",auth()->user()->id)->delete();
            $action="delete";
            }

        $flag=true;

         }elseif($type=="photo"){

            $photo =Photo::findOrFail($id);
            if($photo->likes->count()==0){
              $photo->likes()->create([
                  "user_id" => auth()->user()->id,
                  "type"=> $type,
              ]);
              $action="add";
          }else{
              $photo->likes()->where("user_id",auth()->user()->id)->delete();
              $action="delete";
              }
          $flag=true;
         }

        return json_encode(["status"=>$flag,"action"=>$action],true);
    }

    public function addcart($id){
    

    }

}


