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
<link href="{{asset('assets/libs/@fullcalendar/core/main.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/@fullcalendar/daygrid/main.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/@fullcalendar/bootstrap/main.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/@fullcalendar/timegrid/main.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section("content")

{{-- @include("layouts.component.modal.freelancerreservation.offer") --}}
{{-- @include("layouts.component.modal.userRequests.chat") --}}



<div class="showrequest">
<div class="container">

    <div id="calendar">
        <div id="calendar_header"><i class="icon-chevron-left"></i>
            <h1></h1><i class="icon-chevron-right"></i>
        </div>

        <div id="calendar_weekdays"></div>
        <div id="calendar_content"></div>
    </div>

    <div class="section-header ">
        <h3 class="text-black">Reservation List</h3>
    </div>


    <div class="requesties d-flx flex-column pt-4">
@foreach ($reservations as $request)


{{-- @if ($request->status=="Pending" && $request->date_time< now() ) --}}
@if ($request->status=="Pending" && $request->offer->first())
<a  href="#feelancerReservationPendingcancancel{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

 @elseif($request->status=="Pending" && $request->date_time< now())
 <a  href="#penddingcancel{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-r elative mb-5" >
 @elseif($request->status=="Pending")
 <a href="#feelancerReservationPendingAceptOrReject{{ $request->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">

 @elseif(($request->status=='In Process' && $request->due_date < now()->toDateString() ) ||$request->status=='Rejected' )
 <a  href="#inprogressenddueprivate{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

 @elseif($request->status=='In Process' )
 <a  href="#inprogress{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

 @elseif($request->status=='Waiting' )
 <a data-bs-toggle="modal" href="#userreservationwaitandinprogress{{$request->id}}" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">

 @elseif($request->status=='Cancel by customer' )
 <a  href="#canceleduserreservation{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >
 @elseif($request->status=='reject' )
 <a  href="#reject{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >
 @elseif($request->status=='Finished' )
 <a  href="#userfinishedreservation{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >
 @elseif($request->status== 'Completed'  )
 <a  href="#usercompletedreservation{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

 @else

<a  href="#"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

@endif


   
        <div class="d-flex justify-content-between align-items-baseline" style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">{{$request->random_id}}</h3>
            </div>
            @if($request->status == 'Pending')
                            <p class="status gray" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                        @elseif($request->status == 'In Process')
                            <p class="status gray text-warning" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                        @elseif($request->status == 'Finished')
                            <p class="status gray" style="color: rgb(214, 214, 42);" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                        @elseif($request->status == 'Completed')
                            <p class="status gray text-black" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                        @elseif($request->status == 'Cancel by customer'||$request->status == 'reject')
                            <p class="status text-danger" >{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                        @endif
        </div>

        <div class="d-flex">
                
            @if($request->date_time < now()->toDateString())
            <div class="d-flex flex-column px-2">
                <p class="m-0">Reserve date</p>
                <span class="text-danger">{{date_format(new dateTime($request->date_time),'d/m/Y')}}</span>
                <div>
                </div>
            </div>
        @else
            <div class="d-flex flex-column px-2">
                <p class="m-0">Reserve date </p>
                <span>{{date_format(new dateTime($request->date_time),'d/m/Y')}}</span>
                <div>
                </div>
            </div>
        @endif
        
        @if($request->offer->first() !=null)
        <div class="d-flex flex-column px-2">
            <p class="m-0">Price</p>
            <span >{{$request->offer->first()->price }}</span>
            <div>
            </div>
        </div>
    @else
       
    @endif
        </div>
    </a>




{{-- 
@if ($request->status == 'Pending')
    <a href="#feelancerReservationPendingAceptOrReject{{ $request->id }}" data-bs-toggle="modal" role="button" class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline" style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status gray" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class=" d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ date_format(new DateTime($request->date_time,),'Y-m-d')}}</span>
            </div>
        </div>
    </a>
@endif


@if ($request->status == 'Pending')
    <a href="#feelancerReservationPendingcancancel{{ $request->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">{{$request->id}}</h3>
            </div>
            <p class="status gray" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ date_format(new DateTime($request->date_time,),'Y-m-d')}}</span>
            </div>

            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif




@if ($request->status == 'Waiting')
    <a href="#waitingwithrequest{{ $request->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status orange" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class=" d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $request->date_time }}</span>
            </div>

            <div class=" d-flex flex-column px-2">
                <p class="m-0 text-black-50">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif



@if ($request->status == 'Waiting')
    <a href="#waitingonly{{ $request->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status orange" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $request->date_time }}</span>
            </div>

            <div class=" d-flex flex-column px-2">
                <p class="m-0">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif




@if ($request->status == 'In Process')
    <a href="#frelancerreservationinprogress{{ $request->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status orange" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $request->date_time }}</span>
            </div>

            {{-- <div class=" d-flex flex-column px-2">
                <p class="m-0">Due date</p>
                <span class="deadline">20/09/2010</span>
            </div> --}}
{{-- 
            <div class=" d-flex flex-column px-2">
                <p class="m-0">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif



@if ($request->status == 'Finished')
    <a href="#freelancerreservationfinished{{ $request->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status finish" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 finish "></i></p>
        </div>

        <div class="d-flex ">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $request->date_time }}</span>
            </div>

            {{-- <div class=" d-flex flex-column px-2">
                <p class="m-0">Due date</p>
                <span>20/09/2010</span>
            </div> --}}

            {{-- <div class=" d-flex flex-column px-2">
                <p class="m-0">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif


@if ($request->status == 'Completed')
    <a href="#freelancerreservationcompleted{{ $request->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status text-black" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 text-black "></i></p>
        </div>

        <div class="d-flex">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $request->date_time }}</span>
            </div>

            <div class="d-flex flex-column px-2">
                <p class="m-0">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif  --}}


    {{--  SHOW MODAL BASED ON REQUEST STATUS --}}


   
    @if ($request->status=="Pending" && $request->offer->first())
   
    @include("layouts.component.modal.freelancerreservation.pendingcancancel")
     @elseif($request->status=="Pending" && $request->date_time< now())
     
     @elseif($request->status=="Pending")
     @include("layouts.component.modal.freelancerreservation.PendingAcceptOrReject")
     @include("layouts.component.modal.freelancerreservation.offer")
     
     @elseif(($request->status=='In Process' && $request->due_date < now()->toDateString() ) ||$request->status=='Rejected' )
     
     
     @elseif($request->status=='In Process' )
     
     
     @elseif($request->status=='Waiting' )
     @elseif($request->status=='reject' )
     @include("layouts.component.modal.freelancerreservation.rejected")
     
     @elseif($request->status=='Cancel by customer' )
     @include("layouts.component.modal.userresrvationrequest.canceled")
     @include("layouts.component.modal.userRequests.chat")
     @elseif($request->status=='Finished' )
  
     @elseif($request->status == 'Cancel by customer'|| $request->status == 'cancel by freelancer')
     @include("layouts.component.modal.userresrvationrequest.canceled")
    
     @else
    
  
    
    @endif




{{-- 
@include("layouts.component.modal.freelancerreservation.pendingcancancel")
@include("layouts.component.modal.freelancerreservation.waitingwithrequest")
@include("layouts.component.modal.freelancerreservation.waitingonly")
@include("layouts.component.modal.freelancerreservation.inprogress")
@include("layouts.component.modal.freelancerreservation.finished")
@include("layouts.component.modal.freelancerreservation.completed")
@include("layouts.component.modal.freelancerreservation.rejectedorcanceled") --}}

@endforeach

</div>
</div>
</div>
@endsection



@section("js")
<script src="{{asset('assets/libs/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
<script src="{{asset('assets/js/pages/rating-init.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
<!-- plugin js -->
<script src="{{asset('assets/libs/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-ui-dist/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/libs/@fullcalendar/core/main.min.js')}}"></script>
<script src="{{asset('assets/libs/@fullcalendar/bootstrap/main.min.js')}}"></script>
<script src="{{asset('assets/libs/@fullcalendar/daygrid/main.min.js')}}"></script>
<script src="{{asset('assets/libs/@fullcalendar/timegrid/main.min.js')}}"></script>
<script src="{{asset('assets/libs/@fullcalendar/interaction/main.min.js')}}"></script>
<!-- Calendar init -->
<script src="{{asset('assets/js/pages/calendar.init.js')}}"></script>



<script>

    
    $(document).ready(function () {
    $('.chat').on('show.bs.offcanvas',function(){
    
    var request_id= $(this).attr('data-id');
    var type= $(this).attr('data-type');
    var mesageto= $(this).attr('data-to');
    var conversation =$(this).find('.conversation')
    // console.log(.append("asdsdas"));
    var olddata =0;
    type=type.trim();
    
    mesageto=mesageto.trim();
    setTimeout(getmessage, 0);
    var getmes =setInterval(getmessage,3000);
    
    function getmessage() { 
    $.ajax({
    url: "{{URL::to('user/chat')}}",
    type: "GET",
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data:{'type':type,'messageto':mesageto ,'request_id':request_id},
    dataType: "json",
    success: function(data) {
    if(data['status'] !='no message'){
    
    conversation.html(" ");
    $.each(data['message'],  function (index, el) {  
        if(el.from !={{auth()->user()->id}}){
    
    let message= " ";
    message=  '<div class="rightcont"> <div class="chat-txt rightside"> <p>'+
    el.text
           +' </p> <span>'+
            new Date(el.created_at).toLocaleTimeString() 
           +
            '</span> </div> </div>';
    
            conversation.append(message);
       
    
        }else{
    
            let message2= " ";
    message2=  '<div class="leftcont"> <div class="chat-txt leftside"> <p>'+
    el.text
           +' </p> <span>'+
            new Date(el.created_at).toLocaleTimeString() +
            '</span> </div> </div>';
    
            conversation.append(message2);
         
        }
    
    
        
    
    
    });
    
    
    
    if( Object.keys(data).length >olddata){
    
    $('.conversation').scrollTop($('.conversation')[0].scrollHeight);
    olddata=Object.keys(data).length;
    }
    $('.chat').on('hide.bs.offcanvas',function(){
    clearInterval(getmes);
    });
    
    
    }else{
    
        conversation.html(data['message']);
    
    }
    }
    
    });
    
    
    }
    
    });
    
    });
    // end get message
    
    
    
    function sendmessage(e){
        
            $.ajax({
               
                url: "{{route('user.chat.store')}}",
                type: "POST",
                data:$(e).serialize(),
                dataType: "json",
                success: function(data) {
                if(data){
                    console.log(data);
                    $(e).find('.messageinput').val(' ');
    
                }else{
                    
                    
                }
                }
            
                });
            
      
    
    
    
    }
    
    
    @if(Session::has('state') && Session::get('state')=="reject")
    $(document).ready(function() {
    
        $('#reject{{Session::get('id')}}').modal('show');
         
    });
    @endif
    @if(Session::has('state') && Session::get('state')=="offersend")
    $(document).ready(function() {
    
        $('#feelancerReservationPendingcancancel{{Session::get('id')}}').modal('show');
         
    });
    @endif
</script>    
@endsection
