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
                  <li><a href="#">{{ $category->title_en }}</a></li>
                
                
                                
            @endforeach
        </ul>
            {{-- <ul class="subcategory">
                <li><a href="#"></a></li>
            </ul> --}}

            @foreach (App\Models\Category::all() as $category)

            <div class="subcategorys" id="subcategorys{{$category->id}}">
                <div class="d-flex"><button type="button" id="closesubcategory">
                    <i class="fa fa-arrow-left"></i>
                   </button></div>
                @foreach ( $category->services as  $service)
                <a href="#">{{$service->service_en}}</a>
                @endforeach
                </div>
            @endforeach
        </div>

        <div class="product-table" >
        <div class="filtercontainer d-flex align-items-baseline justify-content-start mb-2">
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
        <div class="d-flex flex-column px-md-4">

            @foreach ($freelancers as $freelancer)
  
            @auth
                
            @if (Auth::user()->id != $freelancer->id)
            <a class="freelanc" href="{{ route('showFreelancerDetails', $freelancer->id) }}">
                <div class="image">
                    <img src="{{ asset("Admin3/assets/images/users/".$freelancer->profile_image) }}" alt="">
                </div>
        
                <div class="info ">
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
                        <p>service :</p>
                        <p>{{ $freelancer->service_en }}</p>
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
        $(".filter-button").click(function(){
            console.log("heool");
            $(".filter-items").toggle();
        });


            
$(".category a.active").click(function(e){

e.preventDefault();

$(".subcategorys").toggle();
})
  
$('#closesubcategory').click(function(){
$(".subcategorys").hide();
});
    </script>


@endsection
