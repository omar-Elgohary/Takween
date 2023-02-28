<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
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
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
        ]);
dd($request);
        $data = $request->only('profile_image', 'name', 'phone', 'email');
        $photo_name=User::findOrFail($id)->profile_image;
        if($request->hasFile('profile_image')){

            File::delete('Admin3/assets/images/users'.$photo_name);
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
        // $this->validate($request, [
        //     'profile_image' => 'sometimes|image|mimes:png,jpg',
        //     'name' => 'required|string',
        //     'phone' => 'required|unique:users',
        //     'email' => 'required|unique:users',
        //     'bio' => 'required',
        //     'id_number' => 'required|unique:users',
        //     'business_register' => 'required|unique:users',
        // ]);

        $data = $request->only('profile_image', 'name', 'phone', 'email', 'bio', 'id_number', 'business_register');
        if($request->hasFile('profile_image')){
            $data['profile_image'] = Storage::disk('public')->put('Admin3/assets/images/users', $request->file('profile_image'));
        }
        User::find($id)->update($data);

        return back();
    }
}


