<?php
namespace App\Http\Controllers;
use App\Models\User;
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
}


