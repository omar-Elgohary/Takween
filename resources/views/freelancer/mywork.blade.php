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


{{-- @include("layouts.component.modal.freelancerRequests.pendingwithsendoffer") --}}
{{-- @include("layouts.component.modal.freelancerRequests.inprogress") --}}
{{-- @include("layouts.component.modal.freelancerRequests.offer") --}}


{{-- @include("layouts.component.modal.userRequests.chat") --}}



<div class="showrequest">
    <div class="container">
       

        <div class="requestlink py-4 d-flex justify-content-evenly align-items-center">
            <a href="{{route('freelanc.neworder')}}" class=" fs-4 text-black-50 ">new orders</a>
            <a href="{{route('freelanc.mywork')}}"   class="active  fs-4">mywork</a>
        </div>



        <div class="filtercontainer d-flex align-items-baseline justify-content-start">
            <div class="filter d-flex align-items-baseline">
              <button class=" btn d-flex align-items-center justify-content-between">
                    <i class="fa-solid fa-filter px-2 fs-3"></i>
                            <span >filter by:</span>
                        </button>
                        <span class=" px-2">All</span>
             </div>
                
        </div>


       <div class="requesties d-flx flex-column pt-5">
          
      

@foreach ( $result as $request)


@if($request->status=='Pending')
<a data-bs-toggle="modal" href="#freelancerallstatus{{$request->id}}" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
@elseif($request->status=='In Process')

<a data-bs-toggle="modal" href="#freelancerorderinprogress{{$request->id}}" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">

@elseif($request->status=='Finished')
<a data-bs-toggle="modal" href="#freelancerallstatus{{$request->id}}" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
@elseif($request->status=='Completed')
<a data-bs-toggle="modal" href="#freelancerallstatus{{$request->id}}" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
@else

<a data-bs-toggle="modal" href="#freelancerallstatus{{$request->id}}" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
@endif


<div class="d-flex justify-content-between align-items-baseline">
  <div class="frelacereq d-flex ">
    <img src="{{ asset("Admin3/assets/images/users/".App\Models\User::where('id',$request->user_id)->first()->profile_image) }}" class="img-fluid rounded-top" alt="">
      <div class="freelanereq mx-2">
      <h3 class="fw-600">{{App\Models\User::find($request->user_id)->name}}</h3>
        <span class="text-black-50">#123123</span>
      </div>
  </div>
  @if($request->status == 'Pending')
  <p class="status gray" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
@elseif($request->status == 'In Process')
  <p class="status gray text-warning" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
@elseif($request->status == 'Finished')
  <p class="status finish "  data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
@elseif($request->status == 'Completed')
  <p class="status gray text-black" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
  @else
  <p class="status gray text-black" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
@endif
</div>
<div class="d-flex ">
    <div class="d-flex flex-column px-2">
       <p class="m-0">req.date</p>
        <span>{{date_format($request->created_at,"Y-m-d") }}</span>
    </div>
    <div class=" d-flex flex-column px-2">
        <p class="m-0">Due date</p>
        <span>{{ $request->due_date }}</span>
    <div>
</div>

    </div>

    
@if($request->offer->where('freelancer_id',auth()->user()->id)->first()!=null )
<div class="d-flex flex-column px-2">
    <p class="m-0">price</p>
    <span >{{$request->offer->where('freelancer_id',auth()->user()->id)->first()->price }}</span>
    <div>
    </div>
</div>
@endif

 </div>

 
</a>



{{-- modal --}}

@if($request->status=='Pending')
@include("layouts.component.modal.freelancerRequests.allstatus")
@include("layouts.component.modal.userRequests.chat")
@elseif($request->status=='In Process')

@include("layouts.component.modal.freelancerRequests.inprogress")
@include("layouts.component.modal.userRequests.chat")

@elseif($request->status=='Finished')
@include("layouts.component.modal.freelancerRequests.allstatus")
@include("layouts.component.modal.userRequests.chat")
@elseif($request->status=='Completed')
@include("layouts.component.modal.freelancerRequests.allstatus")
@include("layouts.component.modal.userRequests.chat")

@else
@include("layouts.component.modal.freelancerRequests.allstatus")
@include("layouts.component.modal.userRequests.chat")

@endif


@endforeach
    

    {{-- <a data-bs-toggle="modal" href="#freelancerorderinprogress" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="frelacereq d-flex ">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">
                  <div class="freelanereq mx-2">
                    <h3 class="fw-600">customer name</h3>
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
                    <h3 class="fw-600">customer name</h3>
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
                    <h3 class="fw-600">customer name</h3>
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
                    <h3 class="fw-600">customer name</h3>
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

             
    </a> --}}

       </div>
</div>
</div>


@endsection

@section("js")
<script src="{{asset('assets/libs/jquery-bar-rating/jquery.barrating.min.js')}}"></script>

<script src="{{asset('assets/js/pages/rating-init.js')}}"></script> 
@endsection