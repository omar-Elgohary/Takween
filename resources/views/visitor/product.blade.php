@extends("layouts.home.index")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
product
@endsection
@section("header")
@endsection


@section("css")
<style>
  .product-detail .row{
      flex-grow: 1;
      
  }
  .product-detail {
      width: 100%;
  
  }
  
  </style>
@endsection


@section("content")

  <div class="product-page">
        <div class="container d-flex flex-column ">
            <div class="header d-flex align-items-center">
                <div class="title">
                    
                    <div class="info d-flex flex-column  ">
                        <h2 class="bold text-black">{{$product->name}} </h2>
                       <div class="freelancer-info d-flex  ">
                                <div class="d-flex ">
                                    <div class="image">
                                        <img src="{{ asset('Admin3/assets/images/users/'.App\Models\User::where('id', $product->freelancer_id)->first()->profile_image) }}" >
                                  
                                </div>
                                 <p class="card-text ">{{\APP\Models\User::find($product->freelancer_id)->name}} <span class="text-black-50 px-2">|</span></p>
                              </div>
                              <div  class="freelacer-rate">
                                  <i class="fa-solid fa-star align-self-center"></i>
                                  <span>
                                    @if( App\Models\Review::select('rate')->where('freelancer_id',$product->freelancer_id)->count()>0)
                                    {{App\Models\Review::select('rate')->where('freelancer_id',$product->freelancer_id)->sum('rate')/  App\Models\Review::select('rate')->where('freelancer_id',$product->freelancer_id)->count()}}
                                @else
{{App\Models\Review::select('rate')->where('freelancer_id',$product->freelancer_id)->count()}}
                                @endif
                                </span>
                              </div>
                                </div>
                                
                              
                    </div>
                </div>
                
             <div class="service d-flex justify-content-end  flex-1">
                <div class="serv d-flex align-items-center">
                    <div  class="prod-likes withborder py-2 px-3 rounded-pill">
                                  <i class="fa-solid fa-heart align-self-center"></i>
                                  <span>{{$product->likes->count()}}</span>
                              </div>

                              <form action="">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#addcart"class="btn  btn-modal  my-3 btn-model-primary">add to chart</button>
                              </form>
                </div>
                
             </div>

            </div>

            <div class="contentporduct row  ">
             
              <div class = "card-wrapper  col-lg-6 col-md-6 col-sm-12 ">
                <div class = "card ">
                  <!-- card left -->
                  <div class = "product-imgs d-flex">
                      <div class="product-detail">
                          <div class="row">
                              <div class="col-3">

                                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    {{-- {{$images=array($product->img1,$product->img2,$product->img2)}}

                                    @foreach (array($product->img1,$product->img2,$product->img2) as $image )

                                        @if ($image!=null) --}}
                                        {{-- <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab">
                                            <img src="{{ asset('assets/images/product/'.$product->img1) }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                        </a>
                                        @endif --}}
                                    <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab">
                                        <img src="{{ asset('assets/images/product/'.$product->img1) }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                    </a>
                                    <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab">
                                        <img src="{{ asset('assets/images/product/'.$product->img2) }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                    </a>
                                    <a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3" role="tab">
                                      <img src="{{ asset('assets/images/product/'.$product->img3) }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                  </a>
                                        
                                    {{-- @endforeach --}}
                                     
                                      
                                  </div>
                              </div>
          
                              <div class="col-9">
                                  <div class="tab-content position-relative" id="v-pills-tabContent">
          
                                    
                                      <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                          <div class="product-img">
                                              <img src="{{ asset('assets/images/product/'.$product->img1) }}" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/Component5.png">
                                          </div>
                                      </div>
                                      <div class="tab-pane fade" id="product-2" role="tabpanel">
                                          <div class="product-img">
                                              <img src="{{ asset('assets/images/product/'.$product->img2) }}" alt="" class="img-fluid mx-auto d-block">
                                          </div>
                                      </div>
                                      <div class="tab-pane fade" id="product-3" role="tabpanel">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/images/product/'.$product->img3) }}" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                  </div>
                                
                                  
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
                          <div class="description  col-lg-6 col-md-6 col-sm-12  d-flex flex-column ">
                              <div class="price">{{$product->price}}<span class="curancy">
                                  S.R
                              </span>
          
                              </div>
                              <div class="body">
                                {{$product->description}}
                              </div>
                              <div class="proprity py-4" >
                                  <h2 >proprities</h2>
                                  <ul >
                                      <li>File type: PDF, PSD</li>
                                      <li>Programs used: illustrator, InDesign </li>
                                      <li>File size: A4</li>
                                      
                                  </ul>
                              </div>
                              
                          </div>
                      </div>

            <div class="similar ">
                <div class="section-header d-flex  ">
            <h2 class="me-auto">similar products</h2>

            <a href="{{route('products',['cat_id'=>$product->cat_id,'subcat_id'=>$product->service_id])}}" class="flex-1">See all</a>
            </div>
            <div class="product-table">
            <div class="row">

                @forelse ( $similar as $s )
                    

                <div class="card-container col-xs-12 col-sm-6 col-md-4 col-lg-3" >
                    <div class="card " style="max-width: 300px">
                      <div class="image-product" style="width:auto; height:auto">
                        @foreach (array($product->img1,$product->img2,$product->img2) as $image )
                            @if ($image !=null)
                            <img src="{{asset('assets/images/product/'.$image) }}" class="card-img-top" alt="product image">
                                @break
                            @endif
                        @endforeach
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
                                  <h5 class="card-title">{{$s->name}}</h5>
                                  <div class="freelancer-info d-flex align-items-center ">
                                    <div class="image">
                                        <img src="{{ asset('Admin3/assets/images/users/'.App\Models\User::where('id', $product->freelancer_id)->first()->profile_image) }}" alt="">
                                    </div>
                                     <p class="card-text ">{{\APP\models\User::find($s->freelancer_id)->name}}</p>
                                  </div>
                                  <div  class="prod-likes ">
                                      <i class="fa-solid fa-heart align-self-center"></i>
                                      <span>{{$s->likes->count()}}</span>
                                  </div>
                                
                                </div>
                     </div>
                     </div>
    
                @empty
                    <span>no product</span>
                @endforelse
              

                 {{-- end card --}}
              
            
              </div>
          </div>
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