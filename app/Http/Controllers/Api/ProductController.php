<?php
namespace App\Http\Controllers\Api;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Api\ApiResponseTrait;

class ProductController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $products = Product::get();
        return $this->returnData(200, 'Products Returned Successfully', $products);
    }


    public function store(Request $request)
    {
        try {
            $product= Product::create([
                'freelancer_id' => Auth::user()->id,
                'cat_id'=> $request->cat_id,
                'service_id'=> $request->service_id,
                'name'=> $request->name,
                'price'=> $request->price,
                'description'=> $request->description,
                'attachment' => $request->file("attachment"),
                'img1' => $request->file("img1"),
                'img2' => $request->file("img2"),
                'img3' => $request->file("img3"),
            ]);
            return $this->returnData(201, 'Product Created Successfully', $product);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Product Created Failed');
        }
    }


    public function show($id)
    {
        $product = Product::find($id);
        if(!$product){
            return $this->returnError('404', 'Product Not Found');
        }
        return $this->returnData(200, 'Product Returned Successfully', $product);
    }


    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if(!$product)
                return $this->returnError('404', 'Product Not Found');

            $product->update($request->all());
            return $this->returnData(200, 'Product Updated Successfully', $product);
        }catch(\Exception $e){
            return $this->returnError('404', 'Product Not Found');
        }
    }


    public function destroy($id)
    {
        try {
        $product = Product::find($id)->delete();
        if(!$product){
            return $this->returnError('404', 'Product Not Found');
        }
            return $this->returnSuccess(200, 'Product Deleted Successfully');
        }catch(\Exception $e){
            echo $e;
            return $this->returnError('404', 'Product Not Found');
        }
    }

}
