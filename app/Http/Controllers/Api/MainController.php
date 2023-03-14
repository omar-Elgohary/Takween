<?php
namespace App\Http\Controllers\Api;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;

class MainController extends Controller
{
    use ApiResponseTrait;

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
