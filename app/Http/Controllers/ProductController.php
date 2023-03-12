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
        if(APP::getLocale()=='ar'){
            $services = DB::table("services")->where("category_id" , $id)->pluck("service_ar" , "id");
        }else{
            $services = DB::table("services")->where("category_id" , $id)->pluck("service_en" , "id");
        }

        return json_encode($services);
    }


    public function displayAllProducts()
    {
           $filter=[];

        if(request()->cat_id && request()->subcat_id){
            $products = Product::where('cat_id',request()->cat_id)->where('service_id',request()
            ->subcat_id)->get();
            $categories = Category::all();

            if(request('productsearch')!=null){


            if(in_array('newest',request('productsearch'))){
                $products=$products->sortBy('created_at');
                array_push($filter,'newest');
            }
            if(in_array('highestrating',request('productsearch'))){
                $products=$products->sortBy(function($item){
                    return $item->likes()->count();
                });
                array_push($filter,'highestrating');
            }
            if(in_array('pricelowtoheight',request('productsearch'))){
                $products=$products->sortByDesc('price');
                array_push($filter,'pricelowtoheight');
            }

        }else{

           array_push($filter,'All');
        }
            return view('visitor.products', ['products'=>$products, 'categories'=>$categories,'cat_id'=>request()->cat_id,'subcat_id'=>request()->subcat_id,'filter'=>$filter]);

        }elseif(request()->cat_id ){
            $products = Product::where('cat_id',request()->cat_id)->get();
            $categories = Category::all();
            if(request('productsearch')!=null){


                if(in_array('newest',request('productsearch'))){
                    $products=$products->sortBy('created_at');
                }
                if(in_array('highestrating',request('productsearch'))){
                    $products=$products->sortBy(function($item){
                        return $item->likes()->count();
                    });
                }
                if(in_array('pricelowtoheight',request('productsearch'))){
                    $products=$products->sortByDesc('price');
                }

            }else{
                array_push($filter,'All');
            }

            return view('visitor.products', ['products'=>$products, 'categories'=>$categories,'cat_id'=>request()->cat_id,'filter'=>$filter]);

        }else{
            $products = Product::all();
            $categories = Category::all();
            if(request('productsearch')!=null){

                if(in_array('newest',request('productsearch'))){
                    $products=$products->sortBy('created_at');
                }
                if(in_array('highestrating',request('productsearch'))){
                    $products=$products->sortBy(function($item){
                        return $item->likes()->count();
                    });
                }
                if(in_array('pricelowtoheight',request('productsearch'))){
                    $products=$products->sortByDesc('price');
                }

            }else{
                array_push($filter,'All');
            }
            return view('visitor.products', compact('products', 'categories' ,'filter'));
        }
    }




    // user show product
    function usershowproduct($id)
    {
        $product= Product::findOrFail($id);
        $similar=Product::where(function($q) use($product){
            $q->where('cat_id',$product->cat_id)->orWhere("service_id",$product->serivce_id);
        })->limit(4)->get();
        return view('visitor.product',compact('similar','product'));
    }



    public function filter()
    {
        $categories = Category::all();
        $products = Product::get();

        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            if($_GET['sort'] == 'product_newest'){
                $products = Product::orderBy('created_at', 'asc')->get();   // تنازلي من الكبير للصغير
            $similar=Product::where(function($q) use($product){
                $q->where('cat_id',$product->cat_id)->orWhere("service_id",$product->serivce_id);
            })->limit(4)->get();

            }elseif($_GET['sort'] == 'product_rate'){
                $products = DB::table('likes')->where('likesable_type', 'Product')->orderBy('likesable_id', 'asc')->get();

            }elseif($_GET['sort'] == 'product_price'){
                $products = Product::orderBy('price', 'desc')->get();       // تصاعدي من الصغير للكبير
            }
        }

        return view('visitor.filter', compact('categories', 'products'));
       return view('visitor.product',compact('product','similar'));
    }
}

