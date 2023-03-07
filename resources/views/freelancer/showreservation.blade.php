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


@foreach ($reservations as $reservation)
<div class="requesties d-flx flex-column pt-4">

@if ($reservation->status == 'Pending')
    <a href="#feelancerReservationPendingAceptOrReject{{ $reservation->id }}" data-bs-toggle="modal" role="button" class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline" style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status gray" data-color="C4C3C3">{{ $reservation->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class=" d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ date_format(new DateTime($reservation->date_time,),'Y-m-d')}}</span>
            </div>
        </div>
    </a>
@endif


@if ($reservation->status == 'Pending')
    <a href="#feelancerReservationPendingcancancel{{ $reservation->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status gray" data-color="C4C3C3">{{ $reservation->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ date_format(new DateTime($reservation->date_time,),'Y-m-d')}}</span>
            </div>

            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif




@if ($reservation->status == 'Waiting')
    <a href="#waitingwithrequest{{ $reservation->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status orange" data-color="C4C3C3">{{ $reservation->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class=" d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $reservation->date_time }}</span>
            </div>

            <div class=" d-flex flex-column px-2">
                <p class="m-0 text-black-50">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif



@if ($reservation->status == 'Waiting')
    <a href="#waitingonly{{ $reservation->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status orange" data-color="C4C3C3">{{ $reservation->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $reservation->date_time }}</span>
            </div>

            <div class=" d-flex flex-column px-2">
                <p class="m-0">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif




@if ($reservation->status == 'In Process')
    <a href="#frelancerreservationinprogress{{ $reservation->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status orange" data-color="C4C3C3">{{ $reservation->status }}<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $reservation->date_time }}</span>
            </div>

            {{-- <div class=" d-flex flex-column px-2">
                <p class="m-0">Due date</p>
                <span class="deadline">20/09/2010</span>
            </div> --}}

            <div class=" d-flex flex-column px-2">
                <p class="m-0">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif



@if ($reservation->status == 'Finished')
    <a href="#freelancerreservationfinished{{ $reservation->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status finish" data-color="C4C3C3">{{ $reservation->status }}<i class="fa-solid fa-circle px-2 finish "></i></p>
        </div>

        <div class="d-flex ">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $reservation->date_time }}</span>
            </div>

            {{-- <div class=" d-flex flex-column px-2">
                <p class="m-0">Due date</p>
                <span>20/09/2010</span>
            </div> --}}

            <div class=" d-flex flex-column px-2">
                <p class="m-0">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif


@if ($reservation->status == 'Completed')
    <a href="#freelancerreservationcompleted{{ $reservation->id }}" data-bs-toggle="modal" role="button"class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status text-black" data-color="C4C3C3">{{ $reservation->status }}<i class="fa-solid fa-circle px-2 text-black "></i></p>
        </div>

        <div class="d-flex">
            <div class="d-flex flex-column px-2">
                <p class="m-0 text-black-50">Reservation Date</p>
                <span>{{ $reservation->date_time }}</span>
            </div>

            <div class="d-flex flex-column px-2">
                <p class="m-0">Price</p>
                <span>1211 SR</span>
            </div>
        </div>
    </a>
@endif

</div>
</div>
</div>



@include("layouts.component.modal.freelancerreservation.PendingAcceptOrReject")
@include("layouts.component.modal.freelancerreservation.pendingcancancel")
@include("layouts.component.modal.freelancerreservation.waitingwithrequest")
@include("layouts.component.modal.freelancerreservation.waitingonly")
@include("layouts.component.modal.freelancerreservation.inprogress")
@include("layouts.component.modal.freelancerreservation.finished")
@include("layouts.component.modal.freelancerreservation.completed")
@include("layouts.component.modal.freelancerreservation.rejectedorcanceled")

@endforeach
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
@endsection
