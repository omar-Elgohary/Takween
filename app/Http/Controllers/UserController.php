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


    public function destroy(Request $request, $id)
    {
        User::find($id)->delete();
        session()->flash('Delete' , 'تم حذف المستخدم بنجاج');
        return back();
    }


    public function updateUserProfile(Request $request, $id)
    {
        // $this->validate($request, [
        //     'profile_image' => 'sometimes|image|mimes:png,jpg',
        //     'name' => 'required|string',
        //     'phone' => 'required|unique:users',
        //     'email' => 'required|unique:users',
        // ]);

        $data = $request->only('profile_image', 'name', 'phone', 'email');
        if($request->hasFile('profile_image')){
            $data['profile_image'] = Storage::disk('public')->put('Admin3/assets/images/users', $request->file('profile_image'));
        }
        User::find($id)->update($data);

        return back();
    }
}
////////////
