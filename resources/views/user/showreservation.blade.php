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

@section("nosearch","none !important")
@section("content")

{{-- @include("layouts.component.modal.userresrvationrequest.surdeletereservation") --}}
{{-- @include("layouts.component.modal.userresrvationrequest.rejectoffer") --}}
{{-- @include("layouts.component.modal.userresrvationrequest.requestdelay") --}}
{{-- @include("layouts.component.modal.userRequests.chat") --}}
{{-- @include("layouts.component.modal.userRequests.review") --}}


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
@if ($request->status=="Pending" && $request->offer->first())
<a  href="#userReservationPendingAceptOrReject{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

 {{-- @elseif($request->status=="Pending" && $request->date_time < now())
 <a  href="#penddingcancel{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-r elative mb-5" > --}}
 @elseif($request->status=="Pending")
 <a href="#reservpending{{ $request->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">


 @elseif($request->status=='Waiting')
 <a  href="#userreservationwaitandinprogress{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >
 

 @elseif($request->status =='Cancel by customer' ||  $request->status =='reject' )


 <a  href="#canceleduserreservation{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

    
 @elseif($request->status =='Finished' )

 <a  href="#userfinishedreservation{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >


 @elseif($request->status == 'Completed' )
 <a  href="#usercompletedreservation{{$request->id}}" data-bs-toggle="modal"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

 @else

<a  href="#"  role="button" class="request  d-flex  flex-column px-3 py-3 position-relative mb-5" >

@endif
 
        <div class="d-flex justify-content-between align-items-baseline" style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">{{ $request->random_id}} </h3>
            </div>
            @if($request->status == 'Pending')
                            <p class="status gray" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
            
                        @elseif($request->status == 'Waiting' && $request->date_time == time() &&  ($request->from <=now() || $request->to >= now()))
                            <p class=" status inprogress " data-color="C4C3C3">In process<i class="fa-solid fa-circle px-2 "></i></p>

                            @elseif($request->status == 'Waiting' )
                            <p class="status inprogress">{{ $request->status}}<i class="fa-solid fa-circle px-2 "></i></p>
                        @elseif($request->status == 'Finished')
                            <p class="status gray" style="color: rgb(214, 214, 42);" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                        @elseif($request->status == 'Completed')
                            <p class="status gray text-black" data-color="C4C3C3">{{ $request->status}}<i class="fa-solid fa-circle px-2 "></i></p>
                        @elseif($request->status == 'Cancel by customer'||$request->status == 'reject')
                            <p class="status text-danger" >{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                        @endif
        </div>

        <div class="d-flex">
                
            <div class="d-flex flex-column px-2">
                <p class="m-0">Reserve date</p>
                <span class="">{{date_format(new dateTime($request->date_time),'d/m/Y')}}</span>
                <div>
                </div>
            </div>

    
        
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








    {{--  SHOW MODAL BASED ON REQUEST STATUS --}}


    
    @if ($request->status=="Pending" && $request->offer->first())
    @include("layouts.component.modal.userresrvationrequest.offeracceptorreject")
    @include("layouts.component.modal.userresrvationrequest.rejectoffer")
    @include("layouts.component.modal.userresrvationrequest.payment")


     {{-- @elseif($request->status=="Pending" && $request->date_time< now()) --}}

     @elseif($request->status=="Pending")
     @include("layouts.component.modal.userresrvationrequest.reservpending")
     @include("layouts.component.modal.userresrvationrequest.surdeletereservation")
    
     @elseif(($request->status=='In Process' && $request->due_date < now()->toDateString() ) ||$request->status=='Reject' )
     
    
     @elseif($request->status=='Waiting' )
     @include("layouts.component.modal.userresrvationrequest.waitandinprogress")
     @include("layouts.component.modal.userresrvationrequest.surdeletereservation")

     
     @elseif($request->status=='Cancel by customer' || $request->status=='reject' )
     @include("layouts.component.modal.userresrvationrequest.canceled")
     @include("layouts.component.modal.userRequests.chat")

     @elseif($request->status=='Finished' )
     @include("layouts.component.modal.userresrvationrequest.finished")
     {{-- @elseif($request->status == 'Cancel by customer'|| $request->status == 'cancel by freelancer')
     @include("layouts.component.modal.userresrvationrequest.canceled") --}}
    
     
     @elseif($request->status=='Completed' )
     @include("layouts.component.modal.userresrvationrequest.review")
     @include("layouts.component.modal.userresrvationrequest.completed") 
    
     @else
    
    
    
    @endif



@include("layouts.component.modal.userRequests.chat")

{{-- @include("layouts.component.modal.userresrvationrequest.reservpending")
@include("layouts.component.modal.userresrvationrequest.surdeletereservation") --}}
{{--  
@include("layouts.component.modal.userRequests.payment")
@include("layouts.component.modal.userresrvationrequest.offeracceptorreject")
@include("layouts.component.modal.userresrvationrequest.waitwithcancel")
@include("layouts.component.modal.userresrvationrequest.finished")
@include("layouts.component.modal.userresrvationrequest.waitandinprogress")
@include("layouts.component.modal.userresrvationrequest.completed") --}}


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


@if(Session::has('state') && Session::get('state')=="canceledInfirst")
$(document).ready(function() {

    $('#canceleduserreservation{{Session::get('id')}}').modal('show');
     
});
@endif

@if(Session::has('state') && Session::get('state')=="paydone")
$(document).ready(function() {

    $('#paydone').modal('show');
    setTimeout(function(){
        $('#paydone').modal('hide');
    },3000);
     
});
@endif

@if(Session::has('state') && Session::get('state')=="completed")
$(document).ready(function() {

    $('#usercompletedreservation{{Session::get('id')}}').modal('show');
     
});
@endif


 </script>
@endsection
