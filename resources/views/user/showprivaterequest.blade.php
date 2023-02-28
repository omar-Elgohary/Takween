@extends("layouts.home.index")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
notification
@endsection
@section("header")
@endsection


@section("css")
<link href="{{asset('assets/libs/jquery-bar-rating/themes/css-stars.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/jquery-bar-rating/themes/fontawesome-stars-o.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/jquery-bar-rating/themes/fontawesome-stars.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section("nosearch","none !important")

@section("content")
@include("layouts.component.modal.userRequests.payment")
@include("layouts.component.modal.userprivaterequest.penddingacceptorreject")
@include("layouts.component.modal.userprivaterequest.penddingcancel")
@include("layouts.component.modal.userRequests.inprogress")
@include("layouts.component.modal.userRequests.inprogressenddue")
@include("layouts.component.modal.userRequests.chat")
@include("layouts.component.modal.userRequests.review")
@include("layouts.component.modal.userRequests.suredelete")
@include("layouts.component.modal.userRequests.finish")
@include("layouts.component.modal.userRequests.complete")


<div class="showrequest">
    <div class="container">
        <div class="filtercontainer d-flex align-items-baseline justify-content-start">
            <div class="filter d-flex align-items-baseline">
              <button class=" filter-button btn d-flex align-items-center justify-content-between">
                    <i class="fa-solid fa-filter px-2 fs-3"></i>
                            <span >filter by:</span>
                        </button>
                        <span class=" px-2">All</span>
             </div>
                
               <div class="filter-items">
                <form action=""> 
                 <div>
                   <input type="checkbox" name="productsearch" value="all" id="all">
                   <label for="all" class="bold" >all</label>
                 </div>
                 <div>
                   <input type="checkbox" name="productsearch" value="datadesending" id="datadesending">
                   <label for="datadesending"class="bold" >data desending</label>
                 </div>
                 <div>
                   <input type="checkbox" name="productsearch" value="pendding"id="pendding" >
                   <label for="pendding"class="bold" >pendding</label>
                 </div>
                 <div>
                   <input type="checkbox" name="productsearch" value="active"id="active" >
                   <label for="active"class="bold" >active</label>
                 </div>
                 <div>
                   <input type="checkbox" name="productsearch" value="completed"id="completed" >
                   <label for="completed"class="bold" >completed</label>
                 </div>
 
                 <div class="btn-contianer d-flex justify-content-center align-items-center">
                   <button type="submit" class=" border-0 btn-modal  my-3 btn-model-primary ">apply</button>
                  
                    </div>
                 
                </form>
                </div>
        </div>


        <div class="requestlink py-4 d-flex justify-content-evenly align-items-center">
            <a href="{{route('user.showpublicrequest')}}" class=" fs-4 text-black-50 ">public request</a>
            <a href="{{route('user.showprivaterequest')}}" class="active  fs-4">private request</a>
        </div>



       <div class="requesties d-flx flex-column pt-4">
          

    <a data-bs-toggle="modal" href="#penddingcancel" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
     
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="frelacereq d-flex ">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                  <div class="freelanereq mx-2">
                  <h3 class="fw-600">freelancer name</h3>
                    <span class="text-black-50">#123123</span>
                  </div>
              </div>
              <p class="status gray" data-color="C4C3C3">pending<i class="fa-solid fa-circle px-2 "></i></p>
            </div>
            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span>20/09/2010</span>
                <div>
            </div>

                </div>
             </div>

             
    </a>
    <a data-bs-toggle="modal" href="#penddingacceptoreject" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
     
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="frelacereq d-flex ">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                  <div class="freelanereq mx-2">
                  <h3 class="fw-600">freelancer name</h3>
                    <span class="text-black-50">#123123</span>
                  </div>
              </div>
              <p class="status gray" data-color="C4C3C3">pending<i class="fa-solid fa-circle px-2 "></i></p>
            </div>
            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span>20/09/2010</span>
                <div>
            </div>

                </div>
             </div>

             
    </a>

    <a data-bs-toggle="modal" href="#inprogress" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="frelacereq d-flex ">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                  <div class="freelanereq mx-2">
                    <h3 class="fw-600">freelancer name</h3>
                    <span class="text-black-50">#123123</span>
                  </div>
              </div>
              <p class="status orange" data-color="C4C3C3">in progress<i class="fa-solid fa-circle px-2 "></i></p>
            </div>
            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">price</p>
                    <span>1211 SR</span>
                </div>
             </div>

             
    </a>
    <a data-bs-toggle="modal" href="#inprogressenddue" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="frelacereq d-flex ">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                  <div class="freelanereq mx-2">
                    <h3 class="fw-600">freelancer name</h3>
                    <span class="text-black-50">#123123</span>
                  </div>
              </div>
              <p class="status orange" data-color="C4C3C3">in progress<i class="fa-solid fa-circle px-2 "></i></p>
            </div>
            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span class="deadline">20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">price</p>
                    <span>1211 SR</span>
                </div>
             </div>

             
    </a>
    <a data-bs-toggle="modal" href="#finish" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="frelacereq d-flex ">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                  <div class="freelanereq mx-2">
                    <h3 class="fw-600">freelancer name</h3>
                    <span class="text-black-50">#123123</span>
                  </div>
              </div>
              <p class="status finish" data-color="C4C3C3">finish<i class="fa-solid fa-circle px-2 finish "></i></p>
            </div>
            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">price</p>
                    <span>1211 SR</span>
                </div>
             </div>

             
    </a>
    <a data-bs-toggle="modal" href="#complete" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="frelacereq d-flex ">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                  <div class="freelanereq mx-2">
                    <h3 class="fw-600">freelancer name</h3>
                    <span class="text-black-50">#123123</span>
                  </div>
              </div>
              <p class="status text-black" data-color="C4C3C3">complete<i class="fa-solid fa-circle px-2 text-black "></i></p>
            </div>
            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">price</p>
                    <span>1211 SR</span>
                </div>
             </div>

             
    </a>

       </div>
</div>
</div>


@endsection

@section("js")
<script>

$(".filter-button").click(function(){
   
   $(".filter-items").toggle();
 
 });
 
</script>


<script src="{{asset('assets/libs/jquery-bar-rating/jquery.barrating.min.js')}}"></script>

<script src="{{asset('assets/js/pages/rating-init.js')}}"></script> 
@endsection