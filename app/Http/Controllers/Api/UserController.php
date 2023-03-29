<?php
namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\ApiResponseTrait;

class UserController extends Controller
{
    use ApiResponseTrait;

    public function switchToFreelancerAccount(Request $request, $user_id)
    {
        try {
            $request->validate([
                'id_number' => 'required',
                'business_register' => 'required',
            ]);

            $user = User::find($user_id);
            if($user->type == 'customer'){
                $user->update([
                    'id_number' => $request->id_number,
                    'business_register' => $request->business_register,
                    'type' => 'freelancer',
                ]);
            }
            return $this->returnData(200, 'User Switched Successfully', $user);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError('500', 'User Switched Failed');
        }
    }


    public function allFreelancers()
    {
        try{
            $freelancers = User::where('type', 'freelancer')->get();
            foreach ($freelancers as $freelancer) {
                $freelancer->profile_image = asset('Admin3/assets/images/users/'.$freelancer->profile_image);
            }
            return $this->returnData(200, 'Freelancers Returned Successfully', $freelancers);
        }catch(\Exception $e){
            return $this->returnError(400, 'Freelancers Returned Failed');
        }
    }


    public function getFreelancerById(Request $request, $id)
    {
        try{
            $freelancer = User::find($id);
            $freelancer->profile_image = asset('Admin3/assets/images/users/'.$freelancer->profile_image);
            if(!$freelancer || $freelancer->type != 'freelancer'){
                return $this->returnError('404', 'Freelancer Not Found');
            }
            return $this->returnData(200, 'Freelancer Returned Successfully', $freelancer);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Freelancer Returned Failed');
        }
    }



    public function editFreelancer(Request $request, $id)
    {
        try{
            $request->validate([
                'profile_image' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required|unique:users',
                'bio' => 'required',
                'password' => 'required',
                'id_number' => 'required|unique:users',
                'business_register' => 'required|unique:users',
            ]);

            $freelancer = User::find($id);
            if(!$freelancer->id || $freelancer->type != 'freelancer'){
                return $this->returnError(400, "Freelancer Doesn't Exists");
            }
            $freelancer->update([
                'profile_image' => $request->profile_image,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'bio' =>  $request->bio,
                'password' => Hash::make($request->password),
                'id_number' => $request->id_number,
                'business_register' => $request->business_register,
            ]);
            $freelancer['profile_image'] = asset('Admin3/assets/images/users/'.$request->profile_image);
            return $this->returnData(200, 'Freelancer Updated Successfully', $freelancer);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Freelancer Updated Failed');
        }
    }



    public function editCustomer(Request $request, $id)
    {
        try{
            $request->validate([
                'profile_image' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required|unique:users',
                'bio' => 'required',
                'password' => 'required',
            ]);

            $customer = User::find($id);
            if(!$customer->id || $customer->type != 'customer'){
                return $this->returnError(404, "Customer Doesn't Exists");
            }
            $customer->update([
                'profile_image' => $request->profile_image,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'bio' =>  $request->bio,
                'password' => Hash::make($request->password),
            ]);
            $customer['profile_image'] = asset('Admin3/assets/images/users/'.$request->profile_image);
            return $this->returnData(200, 'Customer Updated Successfully', $customer);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Customer Updated Failed');
        }
    }



    public function getCustomerById(Request $request, $id)
    {
        try{
            $user = User::find($id);
            $user->profile_image = asset('Admin3/assets/images/users/'.$user->profile_image);
            if(!$user || $user->type != 'customer'){
                return $this->returnError('404', 'Customer Not Found');
            }
            return $this->returnData(200, 'Customer Returned Successfully', $user);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Customer Returned Failed');
        }
    }


    
    public function allFiles(Request $request, $id)
    {
        try{
            $freelancer = User::find($id);
            $products = Product::where('freelancer_id', $id)->get();
            if(!$freelancer || $freelancer->type != 'freelancer'){
                return $this->returnError(404, "Freelancer Doesn't Existed");
            }
            foreach($products as $product)
                $product['attachment'] = asset('front/upload/files/'.$product->attachment);
                return $this->returnData(200, 'Files Returned Successfully', $products);

        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Files Returned Failed');
        }
    }
}

