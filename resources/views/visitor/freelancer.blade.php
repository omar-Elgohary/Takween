@extends("layouts.home.index")
@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
    Freelancer Profile
@endsection
@section("header")
@endsection
@section("css")
@endsection

@section("content")

@if($freelancer->is_photographer == 0)
    <a href="{{ route('user.requestprivate', $freelancer->id) }}" class="addrequesticon">
        <i class="fa-solid fa-plus"></i>
    </a>
@else
    <a class="addrequesticon" href="#chooseservice" data-bs-toggle="modal">
        <i class="fa-solid fa-plus"></i>
    </a>
@endif

<div class="products-page py-5">
    <div class="container">
        <section class="freelanc v2 " style="max-width: 1200px;margin-left:0;margin-right:0;">
            <div class="image">
                <img src="{{ asset("Admin3/assets/images/users/".$freelancer->profile_image) }}" alt="">
            </div>

            <div class="info">
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
                <div class="txt"  style=" min-height: 125px; ">{{ $freelancer->bio }}</div>
            </div>

            <div class="totals">
                <div class="projects">
                    <i class="fa-solid fa-list-check"></i>
                    <p>{{  App\Models\Requests::where('freelancer_id', $freelancer->id)->where('status','Completed')->count() }}<sub>projects</sub></p>
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
        </section>
    </div>


  @auth
  <div class="container-fluid py-5 px-3" style="padding-top: 185px !important;">
    <div class="section-header">
        <h2>services</h2>
    </div>
  </div>

  <div class="servicex">
     @if(App\models\FreelancerService::where('freelancer_id',$freelancer->id)->get()!=null)
   @foreach (App\models\FreelancerService::where('freelancer_id',$freelancer->id)->get() as $serv)
               

            @if($serv->parent_id ==null)

            <div class="serv">
                <div class="logo">
             <i class="fa-solid {{App\Models\Category::find($serv->service_id)->icon}}"></i>
                </div>
                <div class="txt">
                    @if ( app()->getLocale()=='ar')
                    {{App\Models\Category::find($serv->service_id)->title_ar}}
                        
                    @else
                    {{App\Models\Category::find($serv->service_id)->title_en}}
                        
                    @endif
                </div>
            </div>
            @else

            <div class="serv">
                <div class="logo">
                    <i class="{{App\Models\Service::find($serv->service_id)->service_icon}}"></i>
                </div>
                <div class="txt">
                    @if ( app()->getLocale()=='ar')
                    {{App\Models\service::find($serv->service_id)->service_ar}}
                        
                    @else
                    {{App\Models\Service::find($serv->service_id)->service_en}}
                        
                    @endif
                    
                </div>
            </div>
            @endif
            @endforeach
        @endif
    </div>
      
  @endauth

    <div class="categories pt-5 ms-3 ccs">
        <div class="container-fluid py-5  px-3 scrollable-container">
            <div class="section-header">
                <h2>products</h2>
            </div>
            <button class="pre-btn">
                <i class="fa fa-arrow-left"></i>
            </button>
            <button class="nxt-btn"><i class="fa fa-arrow-right"></i></button>
    
            <div class="products productscroll scrollable">
                @foreach ($products as $product)
                    <div class="card">
                        <div class="image-product">
                            <img src="{{ asset('assets/images/product/'.$product->img1) }}" class="card-img-top" alt="product image">
                            @auth
                            <button type="button" data-type="product" data-id="{{$product->id}}"
                                
                                onclick="likes(this)"
                            class="hart   @if ($product->likes->where("user_id",auth()->user()->id)->count())
                                    active
                                @endif"><i class="fa fa-heart"></i></button>
                                   @else
                                   <button  class="hart" type="button" data-bs-target="#login2" data-bs-toggle="modal"><i class="fa fa-heart"></i></button>
                                  @endauth
    
    
                                  @auth
                                      
                                  <button class="addtochart"  data-id="{{$product->id}}" onclick="addcart(this)">add to cart</button>
                                  @else
                                  <button class="addtochart" data-bs-target="#login2" data-bs-toggle="modal" >add to cart</button>
                                  @endauth
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="freelancer-info d-flex align-items-center ">
                                <div class="image">
                                    <img src="{{ asset("Admin3/assets/images/users/".$freelancer->profile_image) }}" alt="">
                                </div>
                                <p class="card-text">{{ $freelancer->name }}</p>
                            </div>

                            <div  class="prod-likes ">
                                <i class="fa-solid fa-heart align-self-center"></i>
                                <span>{{ $product->likes->count() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@if($freelancer->is_photographer ==1 )

<div class="categories ccs ms-3">
    <div class="container-fluid py-2 px-3 scrollable-container">
        <div class="section-header">
            <h2>photos</h2>
        </div>
        <button class="pre-btn">
            <i class="fa fa-arrow-left"></i>
        </button>
        <button class="nxt-btn"><i class="fa fa-arrow-right"></i></button>
        <div class="products productscroll  scrollable">
            @foreach ($photos as $photo)
                <div class="card">
                    <div class="image-product">
                        <a href="{{route('photo',$photo->id)}}">
                        <img src="{{ asset('assets/images/photo/'.$photo->photo) }}" class="card-img-top" alt="Photo"></a>

                        @auth
                        <button type="button" data-type="photo" data-id="{{$photo->id}}"
                            
                            onclick="likes(this)"
                        class="hart   @if ($photo->likes->where("user_id",auth()->user()->id)->count())
                                active
                            @endif"><i class="fa fa-heart"></i></button>
                               @else
                               <button  class="hart" type="button" data-bs-target="#login2" data-bs-toggle="modal"><i class="fa fa-heart"></i></button>
                              @endauth


                              @auth
                                  
                              <button class="addtochart"  data-id="{{$product->id}}" onclick="addcart(this)">add to cart</button>
                              @else
                              <button class="addtochart" data-bs-target="#login2" data-bs-toggle="modal" >add to cart</button>
                              @endauth
                    </div>

                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title">{{ $photo->name }}</h5>

                        <div  class="prod-likes ">
                            <i class="fa-solid fa-heart align-self-center"></i>
                            <span>{{ $photo->likes->count() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif




<div class="reviews">
<div class="container-fluid d-block">

    <div class="section-header px-4">
        <h2 class="text-black "> reviews <span class="text-black">({{$reviews->count()}})</span></h2>

    </div>

    @forelse ( $reviews  as  $review )
    <div class="review freelanc ">

        <div class="image">
            <img src="{{asset("Admin3/assets/images/users/".App\Models\User::find($review->user_id)->profile_image)}}" alt="">
        </div>
        <div class="info">
            <div class="name">
            <span>{{App\Models\User::find($review->user_id)->name}}</span>
                <div class="rate">

                    
                   
                    @for ( $i=$review->rate ;$i>0; $i-- )
                           
                    <i class="fa fa-star active"></i>
                  
                    
                    @endfor
                    @for ($i=5-$review->rate ; $i>0; $i-- )
                    <i class="fa fa-star" style="color:#777"></i>
                        
                    @endfor

                </div>
            </div>
            <div class="txt">{{$review->pragraph}}</div>

        </div>
</div>
    @empty
        
    @endforelse
    {{-- <div class="review freelanc ">

            <div class="image">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
            </div>
            <div class="info">
                <div class="name">
                <span>ahmed</span>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>
                </div>
                <div class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam velit alias ratione eaque dolores expedita ex repellat ducimus. Ratione quisquam molestiae iusto minima obcaecati tenetur delectus ex ipsam doloribus nulla.</div>

            </div>
    </div>
    <div class="review freelanc ">

            <div class="image">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
            </div>
            <div class="info">
                <div class="name">
                <span>ahmed</span>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>
                </div>
                <div class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam velit alias ratione eaque dolores expedita ex repellat ducimus. Ratione quisquam molestiae iusto minima obcaecati tenetur delectus ex ipsam doloribus nulla.</div>

            </div>
    </div>
    <div class="review freelanc ">
            <div class="image">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
            </div>

            <div class="info">
                <div class="name">
                <span>ahmed</span>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>
                </div>
                <div class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam velit alias ratione eaque dolores expedita ex repellat ducimus. Ratione quisquam molestiae iusto minima obcaecati tenetur delectus ex ipsam doloribus nulla.</div>
            </div>
    </div> --}}

    {{$reviews->links() }}
            <a href="" class=" text-center showmore">show more</a>
</div>
</div>

<!-- chooseservice -->
<div id="chooseservice" class="modal fade p-5  modal-uk"  aria-hidden="true" aria-labelledby="chooseserviceLabel2" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
        </div>

        <div class="modal-body text-center">
            <form action="{{route('user.choseRequestOrReservation',$freelancer->id)}}" id="form-chooserequest" method="POST">
                @csrf
                <h1 class="modal-title fs-5">Request service</h1>

                <div>
                    <input type="radio" value="private" id="private" name="requesttype" required>
                    <label for="private">Request new service</label>
                </div>

                <div>
                    <input type="radio" value="reservation" id="reservation" name="requesttype" required>
                    <label for="reservation">Booking for photo shot</label>
                </div>

                <div class="btn-contianer d-flex flex-md-row justify-content-between align-items-center my-3 fullwidthfield flex-column-reverse">
                    <button class="btn-modal modal-color-text border-0" data-bs-dismiss="modal" type="button" style="width:150px;padding:5px 6px">move back</button>
                    <button class="btn-modal btn-model-primary border-0"style="width:150px;padding:5px 6px" name="submit" type="submit">apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section("js")
<script>

        
    function likes(e){
    // $(this).toggleClass("active");
    var id =$(e).attr('data-id');
     var  type =$(e).attr('data-type');
    var token= $('meta[name="csrf_token"]').attr('content');
    $.ajax({
     type: "GET",
      url: "{{ URL::to('user/addorremovelikes')}}/" + id,
      data:{'type':type},
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      success: function(data) {
        console.log(data);
        if(data['action']=="add"){
            $(e).addClass("active");
        }else if(data['action']=="delete"){
            $(e).removeClass("active");
          
        }
      }
    
      });
    
    
    }
    
    function addcart(e){
        var id =$(e).attr('data-id');
        var token= $('meta[name="csrf_token"]').attr('content');
        $.ajax({
     type: "GET",
      url: "{{ URL::to('user/addcart')}}/" + id,
      data:{'type':type},
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      dataType: "json",
      success: function(data) {
        console.log(data);
        if(data['action']=="add"){
            $(e).addClass("active");
        }else if(data['action']=="delete"){
            $(e).removeClass("active");
        }
      }
    
      });
    }
        </script>
@endsection
