<?php
namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("freelancer.product", compact("products"));
    }


    public function create()
    {
        $categories=Category::all();
        return view("freelancer.addproduct",compact("categories"));
    }


    public function store(ProductRequest $request)
    {
        dd($request);
        $file_extention=$request->file("file")->getCLientOriginalExtension();
        $file_name=time(). ".".$file_extention;
        $request->file->move(public_path('front/upload/product/files'),$file_name);

        $file_extention=$request->file("img1")->getCLientOriginalExtension();
        $img1=time(). ".".$file_extention;
        $request->img1->move(public_path('front/upload/product/images'),$img1);

        $file_extention=$request->file("img2")->getCLientOriginalExtension();
        $img2=time(). ".".$file_extention;
        $request->img2->move(public_path('front/upload/product/images'),$img2);

        $file_extention=$request->file("img3")->getCLientOriginalExtension();
        $img3=time(). ".".$file_extention;
        $request->img3->move(public_path('front/upload/product/images'),$img3);

      $product= Product::create([
        'name'=> $request->name,
        "freelancer_id"=>Auth::user()->id,
        'category_id'=> $request->category,
        'service_id'=> $request->service,
        'price'=> $request->price,
        'description'=> $request->description,
        'file'=> $request->file("file"),
        'img1'=> $request->file("img1"),
        'img2'=> $request->file("img2"),
        'img3'=> $request->file("img3"),
       ]);

       $product->id;
       return redirect()->back();
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }


    public function getCategoryServices($id)
    {
        $services = DB::table("services")->where("category_id" , $id)->pluck("service_en" , "id");
        return json_encode($services);
    }


    public function displayAllProducts()
    {
        $products = Product::paginate(1);
        $categories = Category::all();
        $services = Service::all();
        $likes = Like::all();
        return view('visitor.products', compact('products', 'categories', 'services', 'likes'));
    }
}
