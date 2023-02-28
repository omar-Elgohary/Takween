@extends("layouts.home.index")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
new orders
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
@include("layouts.component.modal.userprivaterequest.penddingacceptorreject")
@include("layouts.component.modal.freelancerRequests.pendingwithsendoffer")
@include("layouts.component.modal.freelancerRequests.offer")

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
        

        <div class="requestlink py-4 d-flex justify-content-evenly align-items-center">
            <a href="{{route('freelanc.neworder')}}"  class="active  fs-4">new orders</a>
            <a href="{{route('freelanc.mywork')}}" class=" fs-4 text-black-50 " >mywork</a>
        </div>



       <div class="requesties d-flx flex-column pt-4">
          
        <div class="privateorders p-2  my-5 " >
            <h3 class="py-3">private orders</h3>

 <a data-bs-toggle="modal" href="#freelancerorderpeindingwithoffer" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
     
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="frelacereq d-flex ">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                  <div class="freelanereq mx-2">
                  <h3 class="fw-600">customer name</h3>
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
                  <h3 class="fw-600">customer name</h3>
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
                </div>
                <div class=" d-flex flex-column px-2">
                  <p class="m-0">price</p>
                  <span>1211 SR</span>
              </div>
             </div>

             
    </a>
        </div>



        <a data-bs-toggle="modal" href="#penddingacceptoreject" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
     
          <div class="d-flex justify-content-between align-items-baseline">
            <div class="frelacereq d-flex ">
              <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                <div class="freelanereq mx-2">
                <h3 class="fw-600">customer name</h3>
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
<script src="{{asset('assets/libs/jquery-bar-rating/jquery.barrating.min.js')}}"></script>

<script src="{{asset('assets/js/pages/rating-init.js')}}"></script> 
@endsection