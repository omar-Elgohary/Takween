<?php
namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\File;
use App\Models\Product;
use App\Models\Photo;
use App\Models\Category;
use App\Models\Service;
use App\Models\FreelancerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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






    public function allFreelancers(Request $request)
    {
        try{
            $freelancers = User::where('type', 'freelancer')->get();
            foreach ($freelancers as $freelancer){
                $freelancer->profile_image = asset('Admin3/assets/images/users/'.$freelancer->profile_image);
            }
            return $this->returnData(200, 'Freelancers Returned Successfully', $freelancers);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Freelancers Returned Failed');
        }
    }



    // $freelancer['product'] = Product::with(['freelancer', 'category', 'service', 'likes'])->get();
    // foreach ($freelancer['product'] as $product){
    //     $product->attachment = asset('front/upload/fils/'.$product->attachment);
    //     $product->img1 = asset('assets/images/product/'.$product->img1);
    //     $product->img2 = asset('assets/images/product/'.$product->img2);
    //     $product->img3 = asset('assets/images/product/'.$product->img3);
    // }



    public function getFreelancerById(Request $request, $id)
    {
        try{
            $freelancer_service=[];
            $freelancer = User::where('type', 'freelancer')->with('review')->find($id);
          
           
            $freelancer->profile_image = asset('Admin3/assets/images/users/'.$freelancer->profile_image);
            
            $freelancer['product'] = Product::where('freelancer_id', $id)->get();
            foreach ($freelancer['product'] as $product){
                $product->attachment = asset('front/upload/fils/'.$product->attachment);
                $product->img1 = asset('assets/images/product/'.$product->img1);
                $product->img2 = asset('assets/images/product/'.$product->img2);
                $product->img3 = asset('assets/images/product/'.$product->img3);
            }
            
            $freelancer['photo'] = Photo::where('freelancer_id', $id)->get();
            foreach ($freelancer['photo'] as $photo){
                $photo->photo = asset('assets/images/photo/'.$photo->photo);
            }
    
           
            $freelanc_service=FreelancerService::where('freelancer_id',$id)->get();
            $freelancer_service=[];
            foreach($freelanc_service as $serv){
             
               if($serv->parent_id==null){
                
                $freelancer_service[]=Category::where('id',$serv->service_id)->select('id' ,'title_en as service_en','title_ar as service_ar','icon','created_at','updated_at')->first();

               }else{
              
                $freelancer_service[]=Service::find($serv->service_id);
                

               }

            }
            
            $freelancer['freelancer_service']=$freelancer_service;

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
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'phone' => 'required|unique:users',
                'profile_image' => 'required',
                'bio' => 'required',
                'id_number' => 'required|unique:users',
                'business_register' => 'required|unique:users',
            ]);

            $freelancer = User::find($id);
            if(!$freelancer->id || $freelancer->type != 'freelancer'){
                return $this->returnError(400, "Freelancer Doesn't Exists");
            }
            
            $freelancer->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'profile_image' => $request->profile_image,
                'bio' =>  $request->bio,
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
    
    
    
    
    
    public function getfreelancerServices(Request $request, $freelancer_id)
    {
        try{
            $freelancer = User::find($freelancer_id);
            $services = FreelancerService::where('freelancer_id', $freelancer_id)->get();
            if($freelancer->type != 'freelancer'){
                return $this->returnError(404, "Freelancer Doesn't Exists");
            }
        }catch(\Exception $e){
            return $this->returnError(400, 'Freelancer Updated Failed');
        }
        return $this->returnData(200, 'Services Returned Successfully', $services);

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
            $files = File::where('user_id', $id)->get();
            
            foreach($files as $file){
                $file->url = asset('front/upload/files/'.$file->url);
            }
            return $this->returnData(200, 'Files Returned Successfully', $files);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Files Returned Failed');
        }
    }
}

