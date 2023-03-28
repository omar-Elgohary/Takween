<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    

    public function ajax_search(Request $request)
    {
        $keywords = array();
        $query = $request->search;
        $products = Product::where('name', 'like', '%' . $query . '%')->get()->take(3);
        $photos = Photo::where('name', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->get()->take(3);
        
        $categories = Category::where(function($q) use($query){
            $q->where('title_en', 'like', '%' . $query . '%')->orWhere('title_ar', 'like', '%' . $query . '%');
        })->get()->take(3);

        $services= Service::where(function($q) use($query){
            $q->where('service_en', 'like', '%' . $query . '%')->orWhere('service_ar', 'like', '%' . $query . '%');
        })->get()->take(3);


        $freelancers=User::where('type','freelancer')->where('name', 'like', '%' . $query . '%')->orWhere('bio', 'like', '%' . $query . '%')->get()->take(3);
// dd(compact('query','categories','photos','products','freelancers'));
// dd(count($freelancers));

$data=" ";
$data.="<div class=' search-data '>";

if(count($categories) > 0){
$data.="<div class='categories-search p-2'>


<div class='search-head'>
        <span>categories</span>
        </div>";

foreach($categories as $category){

    $data.="<div class='category-search py-2'>

    <img src=''>
    <span>".$category->title_en."</span>
    

    </div>";
}


$data.="</div> ";
}



$data.="<div class='other-search'>";


if(count($freelancers) > 0){


    $data.="<div class='freelancers-search'>
    
    <div class='search-head'>
        <span>freelancers</span>
        </div>
    ";

    foreach($freelancers as $freelancer){
        $data.="<a class='freelancer-search py-2' href='".route('showFreelancerDetails', $freelancer->id)."'>
        
        <img src='".asset('Admin3/assets/images/users/'.$freelancer->profile_image)."'>
        <span>".$freelancer->name."</span>

        </a>";
    }
    
    
    $data.="</div> ";

}
if(count($products) > 0){


    $data.="<div class='otherdata-search'>
    <div class='search-head'>
        <span>products</span>
        </div>";

    foreach($products as $product){
        $data.="<a class='product-search py-2' href='".route('product',$product->id)."' >
        <img src='".asset('assets/images/product/'.$product->img1)."'>
        <span>".$product->name."</span>
        
        </a>";
    }
    
    
    $data.="</div> ";

}
if(count($photos) > 0){


    $data.="<div class='otherdata-search'>
    <div class='search-head'>
        <span>photos</span>
        </div>
    ";

    foreach($photos as $photo){
        $data.="<a class='product-search py-2'href='".route('photo',$photo->id)."' >
        <img src='".asset('assets/images/photo/'.$photo->photo)."'>
        <span>".$photo->name."</span>
        
        </a>";
    }
    
    
    $data.="</div> ";

}

$data.=" </div>";


$data.="</div>  ";

if(count($photos) || count($products)||count($freelancers) ||count($categories)){
    return JSON_encode($data);
}else{
    $data="0";
    return JSON_encode($data);
}


//         <div class="">
//     @if (sizeof($keywords) > 0)
//         <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">{{translate('Popular Suggestions')}}</div>
//         <ul class="list-group list-group-raw">
//             @foreach ($keywords as $key => $keyword)
//                 <li class="list-group-item py-1">
//                     <a class="text-reset hov-text-primary" href="{{ route('suggestion.search', $keyword) }}">{{ $keyword }}</a>
//                 </li>
//             @endforeach
//         </ul>
//     @endif
// </div>
// <div class="">
//     @if (count($categories) > 0)
//         <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">{{translate('Category Suggestions')}}</div>
//         <ul class="list-group list-group-raw">
//             @foreach ($categories as $key => $category)
//                 <li class="list-group-item py-1">
//                     <a class="text-reset hov-text-primary" href="{{ route('products.category', $category->slug) }}">{{ $category->getTranslation('name') }}</a>
//                 </li>
//             @endforeach
//         </ul>
//     @endif
// </div>
// <div class="">
//     @if (count($products) > 0)
//         <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">{{translate('Products')}}</div>
//         <ul class="list-group list-group-raw">
//             @foreach ($products as $key => $product)
//                 <li class="list-group-item">
//                     <a class="text-reset" href="{{ route('product', $product->slug) }}">
//                         <div class="d-flex search-product align-items-center">
//                             <div class="mr-3">
//                                 <img class="size-40px img-fit rounded" src="{{ uploaded_asset($product->thumbnail_img) }}">
//                             </div>
//                             <div class="flex-grow-1 overflow--hidden minw-0">
//                                 <div class="product-name text-truncate fs-14 mb-5px">
//                                     {{  $product->getTranslation('name')  }}
//                                 </div>
//                                 <div class="">
//                                     @if(home_base_price($product) != home_discounted_base_price($product))
//                                         <del class="opacity-60 fs-15">{{ home_base_price($product) }}</del>
//                                     @endif
//                                     <span class="fw-600 fs-16 text-primary">{{ home_discounted_base_price($product) }}</span>
//                                 </div>
//                             </div>
//                         </div>
//                     </a>
//                 </li>
//             @endforeach
//         </ul>
//     @endif
// </div>
// @if(get_setting('vendor_system_activation') == 1)
//     <div class="">
//         @if (count($shops) > 0)
//             <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">{{translate('Shops')}}</div>
//             <ul class="list-group list-group-raw">
//                 @foreach ($shops as $key => $shop)
//                     <li class="list-group-item">
//                         <a class="text-reset" href="{{ route('shop.visit', $shop->slug) }}">
//                             <div class="d-flex search-product align-items-center">
//                                 <div class="mr-3">
//                                     <img class="size-40px img-fit rounded" src="{{ uploaded_asset($shop->logo) }}">
//                                 </div>
//                                 <div class="flex-grow-1 overflow--hidden">
//                                     <div class="product-name text-truncate fs-14 mb-5px">
//                                         {{ $shop->name }}
//                                     </div>
//                                     <div class="opacity-60">
//                                         {{ $shop->address }}
//                                     </div>
//                                 </div>
//                             </div>
//                         </a>
//                     </li>
//                 @endforeach
//             </ul>
//         @endif
//     </div>
// @endif
    }

}
