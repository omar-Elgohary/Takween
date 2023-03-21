<?php
namespace App\Http\Controllers\Api;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Models\FreelancerService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;

class MainController extends Controller
{
    use ApiResponseTrait;


    public function aboutUs()
    {
        try{
            $aboutUs = AboutUs::all();
            return $this->returnData(201, 'AboutUs Info Returned Successfully', $aboutUs);
        }catch(\Exception $e){
            return $this->returnError(400, 'There Is No AboutUs Info');
        }
    }



    public function contactUs()
    {
        try{
            $contactUs = ContactUs::all();
            return $this->returnData(201, 'ContactUs Info Returned Successfully', $contactUs);
        }catch(\Exception $e){
            return $this->returnError(400, 'There Is No ContactUs Info');
        }
    }



    public function getAllCategories()
    {
        try{
            $categories = Category::all();
        if(!$categories)
            return $this->returnError('404', 'Categories Not Found');
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Categories Returned Failed');
        }
        return $this->returnData(201, 'Categories Returned Successfully', $categories);
    }



    public function ProductsOfCategory(Request $request, $cat_id)
    {
        try{
            $category = Category::find($cat_id);
            if(!$category){
                return $this->returnError('404', 'Category Not Found');
            }
            $products = Product::where('cat_id', $cat_id)->get();
            return $this->returnData(201, 'Products Returned Successfully', $products);
        }catch(\Exception $e){
            echo $e;
            return $this->returnData(201, 'Products Returned Successfully', $products);
        }
    }



    public function FreelancersOfCategory(Request $request, $cat_id)
    {
        try{
            $category = Category::find($cat_id);
            if(!$category){
                return $this->returnError('404', 'Category Not Found');
            }
            $freelancers = FreelancerService::where('parent_id', $cat_id)->get();
            return $this->returnData(200, 'Freelancers Returned Successfully', $freelancers);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError('404', 'Freelancers Not Found');
        }
    }

    // try{
    //     $cat = Category::find($cat_id);

    //     if($cat->services->exists()){
    //         $service_id = $cat->services->first()->id;
    //         $freelancers = FreelancerService::select('freelancer_id')->where('parent_id', $cat_id)
    //         ->where('service_id',$service_id)->get();
    //         return $this->returnData(200, 'Freelancers Returned Successfully', $freelancers);
    //     }else{
    //         $freelancers = FreelancerService::select('freelancer_id')->where('parent_id', null)
    //         ->where('service_id',$cat_id)->get();
    //         return $this->returnData(200, 'Freelancers Returned Successfully', $freelancers);
    //     }
    // }catch(\Exception $e){
    //         echo $e;
    //         return $this->returnError(400, 'Freelancers Returned Failed');
    //     }



    public function store(Request $request)
    {
        try {
            $request->validate([
                'cat_id' => 'required',
                'service_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'attachment' => 'required',
                'img1' => 'required',
                'img2' => 'nullable',
                'img3' => 'nullable',
            ]);

            if(Auth::user()->type == 'freelancer'){
                $product= Product::create([
                'freelancer_id' => Auth::user()->id,
                'cat_id'=> $request->cat_id,
                'service_id'=> $request->service_id,
                'name'=> $request->name,
                'price'=> $request->price,
                'description'=> $request->description,
                'attachment' => $request->attachment,
                'img1' => $request->img1,
                'img2' => $request->img2,
                'img3' => $request->img3,
            ]);
                return $this->returnData(201, 'Product Created Successfully', $product);
            }else{
                $product['attachment'] = asset('front/upload/files/'.$request->attachment);
                $product['img1'] = asset('assets/images/product/'.$request->img1);
                if($request->has('img2')){
                    $product['img2'] = asset('assets/images/product/'.$request->img2);
                }
                if($request->has('img3')){
                    $product['img3'] = asset('assets/images/product/'.$request->img3);
                }
                return $this->returnError(400, "U Can't Add Product as U aren't A Freelancer");
            }
        }catch(\Exception $e){
            echo $e;
    }
    }


    public function getAllServices()
    {
        try{
            $services = Service::all();
        if(!$services)
            return $this->returnError('404', 'Services Not Found');
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Services Returned Failed');
        }
        return $this->returnData(200, 'Services Returned Successfully', $services);
    }
}
