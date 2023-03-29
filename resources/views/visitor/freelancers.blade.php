@extends("layouts.home.index")
@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
freelancers
@endsection
@section("header")
@endsection
@section("css")
@endsection

@section("content")
@auth
<a class="addrequesticon" href="{{route('user.requestpublic')}}">
    <i class="fa-solid fa-plus"></i>
</a>  
@else
<a class="addrequesticon" href="#login2"  data-bs-toggle="modal">
    <i class="fa-solid fa-plus"></i>
</a>
@endauth
<div class="products-page">
    <div class="container-fluid d-flex  px-0 ">
        <div class="category-table">
            <ul class="category">
                @foreach ($categories as $category)
                @if( empty($category->services->first()))
                <li><a href="{{route('products',['cat_id'=>$category->id])}}"
                    @if(isset($cat_id) && $cat_id==$category->id)
                    class="active"
                    @endif >{{ $category->title_en }}</a></li>
                    @else
                    <li><a href="#" class="linktosubcategory @if(isset($cat_id) && $cat_id==$category->id)
                    active
                        @endif" data-id='{{$category->id}}'>{{ $category->title_en }}</a></li>
                    @endif
                @endforeach
            </ul>

            @foreach (App\Models\Category::all() as $category)
            <div class="subcategorys" id="subcategorys{{$category->id}}">
                <div class="d-flex px-3">
                    <button type="button" class="closesubcategory" data-id='{{$category->id}}'>
                        <i class="fa fa-arrow-left"></i>
                    </button>
                </div>

                <div class="d-flex flex-column">
                    @foreach ( $category->services as  $service)
                    <a href="{{route('products',['cat_id'=>$category->id,'subcat_id'=>$service->id])}}"
                        @if(isset($subcat_id)&&$subcat_id==$service->id)
                            class="active"
                        @endif
                        >{{$service->service_en}}</a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="product-table" >
        <div class="filtercontainer d-flex align-items-baseline justify-content-start mb-2 mx-2">
            <div class="filter d-flex align-items-baseline">
            <button class=" filter-button btn d-flex align-items-center justify-content-between">
                <i class="fa-solid fa-arrow-up-wide-short"></i>
                <span >sort by:</span>
            </button>
            <span class="px-2">All</span>
            </div>

            <div class="filter-items">
            <form action="">
                <div>
                    <input type="checkbox" name="productsearch" value="highestrating" id="highestrating">
                    <label for="highestrating"class="bold" >highest rating</label>
                </div>

                <div>
                    <input type="checkbox" name = "productsearch" value="moreproject" id="moreproject" >
                    <label for="moreproject"class="bold">more project</label>
                </div>

                <div class="btn-contianer d-flex justify-content-center align-items-center">
                    <button type="submit" class=" border-0 btn-modal  my-3 btn-model-primary">apply</button>
                </div>
            </form>
            </div>
        </div>
        
        <div class="d-flex flex-column px-md-4 align-items-center">

            @foreach ($freelancers as $freelancer)

            @auth

            @if (Auth::user()->id != $freelancer->id)
            <a class="freelanc" href="{{ route('showFreelancerDetails', $freelancer->id) }}">
                <div class="image">
                    <img src="{{ asset("Admin3/assets/images/users/".$freelancer->profile_image) }}" alt="">
                </div>

                <div class="info " style="  padding-bottom: 10px;">
                    <div class="name">
                        <span>{{ $freelancer->name }}</span>
                        <div class="rate">
                            <i class="fa fa-star"></i>
                            <span>
                                @if( App\Models\Review::select('rate')->where('freelancer_id',$freelancer->id)->count()>0)
                                {{App\Models\Review::select('rate')->where('freelancer_id',$freelancer->id)->sum('rate')/  App\Models\Review::select('rate')->where('freelancer_id',$freelancer->id)->count()}}
                            @else
  {{App\Models\Review::select('rate')->where('freelancer_id',$freelancer->id)->count()}}
                            @endif
                            </span>
                        </div>
                    </div>

                    <div class="txt">{{ $freelancer->bio }}</div>
                    <div class="service">
                        <div class="d-flex service-head" style="">service:</div>
                        <div class="d-flex flex-wrap ">


                            @if($freelancer->freelancerService->first() !=null)
                            @foreach ($freelancer->freelancerService as $serv)
    
                            @if($serv->parent_id ==null)
    
                            @if ( app()->getLocale()=='ar')
                            <p class="serv-data">  {{App\models\Category::find($serv->service_id)->title_ar}}</p>
                                
                            @else
                            <p class="serv-data"> {{App\models\Category::find($serv->service_id)->title_en}}</p>
                            @endif
    
    
                            @else
    
    
                            @if ( app()->getLocale()=='ar')
                            <p class="serv-data">  {{App\models\service::find($serv->service_id)->service_ar}}</p>
                                
                            @else
                            <p class="serv-data"> {{App\models\Service::find($serv->service_id)->service_en}}</p>
                                
                            @endif
                            @endif
                               
                            @endforeach
                         
                            @else
                            
                     
                            <p class="serv-data">{{__('translate.no data')}}</p>
                          
                            @endif
                        </div>
                   
                       
                    </div>
                </div>

                <div class="totals">
                    <div class="projects">
                        <i class="fa-solid fa-list-check"></i>
                        <p>{{ App\Models\Requests::where('freelancer_id', $freelancer->id)->where('status','Completed')->count() }}<sub>projects</sub></p>
                    </div>

                    <div class="productstotal">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <p>{{ App\Models\Product::where('freelancer_id', $freelancer->id)->count() }}<sub>products</sub></p>
                    </div>

                    <div class="photos">
                        <i class="fa-solid fa-image"></i>
                        <p>{{ App\Models\Photo::where('freelancer_id', $freelancer->id)->count() }}<sub>photos</sub></p>
                    </div>
                </div>
            </a>
        @endif
            @else
                <a class="freelanc" href="{{ route('showFreelancerDetails', $freelancer->id) }}">
                    <div class="image">
                        <img src="{{ asset("Admin3/assets/images/users/".$freelancer->profile_image) }}" alt="">
                    </div>

                    <div class="info ">
                        <div class="name">
                            <span>{{ $freelancer->name }}</span>
                            <div class="rate">
                                <i class="fa fa-star"></i>
                                <span>4,5</span>
                            </div>
                        </div>

                        <div class="txt">{{ $freelancer->bio }}</div>
                        <div class="service">
                            <p>service :</p>
                            <p>{{ $freelancer->service_en }}</p>
                        </div>
                    </div>

                    <div class="totals">
                        <div class="projects">
                            <i class="fa-solid fa-list-check"></i>
                            <p>{{ App\Models\Requests::where('freelancer_id', $freelancer->id)->count() }}<sub>projects</sub></p>
                        </div>

                        <div class="productstotal">
                            <i class="fa-solid fa-dollar-sign"></i>
                            <p>{{ App\Models\Product::where('freelancer_id', $freelancer->id)->count() }}<sub>products</sub></p>
                        </div>

                        <div class="photos">
                            <i class="fa-solid fa-image"></i>
                            <p>{{ App\Models\Photo::where('freelancer_id', $freelancer->id)->count() }}<sub>photos</sub></p>
                        </div>
                    </div>
                </a>

            @endauth

            @endforeach
        </div>

        </div>
    </div>
</div>
@endsection

@section("js")
    <script>
//         $(".filter-button").click(function(){
//             console.log("heool");
//             $(".filter-items").toggle();
//         });



// $(".category a.active").click(function(e){

// e.preventDefault();

// $(".subcategorys").toggle();
// })

// $('#closesubcategory').click(function(){
// $(".subcategorys").hide();
// });


$(document).ready(function () {
    $(".category a.linktosubcategory").click(function(e){
    e.preventDefault();
    var id=$(this).attr('data-id');
    $("#subcategorys"+id).toggle();

    $('.subcategorys').not($("#subcategorys"+id)).hide();
    })

    $('.closesubcategory').click(function(e){
        var id=$(this).attr('data-id');
    $("#subcategorys"+id).hide();

    });
});




    </script>


@endsection
