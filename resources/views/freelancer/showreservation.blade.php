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

@include("layouts.component.modal.freelancerreservation.PendingAcceptOrReject")
@include("layouts.component.modal.freelancerreservation.offer")
@include("layouts.component.modal.freelancerreservation.pendingcancancel")
@include("layouts.component.modal.freelancerreservation.waitingwithrequest")
@include("layouts.component.modal.freelancerreservation.waitingonly")
@include("layouts.component.modal.freelancerreservation.inprogress")
@include("layouts.component.modal.freelancerreservation.finished")
@include("layouts.component.modal.freelancerreservation.completed")
@include("layouts.component.modal.freelancerreservation.rejectedorcanceled")
@include("layouts.component.modal.userRequests.chat")



<div class="showrequest">
    <div class="container">
        <div class="section-header ">
            <h2>reservations </h2>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid">
                                    <button class="btn font-16 btn-primary" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create
                                        New Event</button>
                                </div>

                                <div class="row justify-content-center mt-5">
                                    <img src="assets/images/coming-soon-img.png" alt="" class="img-fluid d-block">
                                </div>

                                <div id="external-events" class="mt-2">
                                    <br>
                                    <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                    <div class="external-event fc-event bg-success" data-class="bg-success">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event Planning
                                    </div>
                                    <div class="external-event fc-event bg-info" data-class="bg-info">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                    </div>
                                    <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating Reports
                                    </div>
                                    <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create New theme
                                    </div>
                                </div>

                                <ol class="activity-feed mb-0 ps-2 mt-4 ms-1">
                                    <li class="feed-item">
                                        <p class="mb-0">Andrei Coman magna sed porta finibus, risus
                                            posted a new article: Forget UX Rowland</p>
                                    </li>
                                    <li class="feed-item">
                                        <p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace Commented Developer Moreno</p>
                                    </li>
                                    <li class="feed-item">
                                        <p class="mb-0">Zack Wetass, Chris combined Commented UX Murphy</p>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

                <div style='clear:both'></div>
                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header py-3 px-4 border-bottom-0">
                                <h5 class="modal-title" id="modal-title">Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>

                            <div class="modal-body p-4">
                                <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Event Name</label>
                                                <input class="form-control" placeholder="Insert Event Name"
                                                    type="text" name="title" id="event-title" required value="" />
                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <select class="form-control form-select" name="category" id="event-category">
                                                    <option  selected> --Select-- </option>
                                                    <option value="bg-danger">Danger</option>
                                                    <option value="bg-success">Success</option>
                                                    <option value="bg-primary">Primary</option>
                                                    <option value="bg-info">Info</option>
                                                    <option value="bg-dark">Dark</option>
                                                    <option value="bg-warning">Warning</option>
                                                </select>
                                                <div class="invalid-feedback">Please select a valid event category</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->

            </div>
        </div>

        <div class="section-header ">
            <h3 class="text-black">Reservation List</h3>
        </div>

    <div class="requesties d-flx flex-column pt-4">




<a href="#feelancerReservationPendingAceptOrReject" data-bs-toggle="modal" role="button" class="request d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline" style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
            </div>
            <p class="status gray" data-color="C4C3C3">pending<i class="fa-solid fa-circle px-2 "></i></p>
        </div>

        <div class="d-flex ">
            <div class=" d-flex flex-column px-2">
                <p class="m-0 text-black-50">reservation date</p>
                <span>20/09/2010</span>

            </div>
        </div>


    </a>
    <a data-bs-toggle="modal" href="#feelancerReservationPendingcancancel" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">

            <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h3 class="reservation-id">#3412312</h3>

                  </div>
              <p class="status gray" data-color="C4C3C3">pending<i class="fa-solid fa-circle px-2 "></i></p>
            </div>
            <div class="d-flex ">

                <div class=" d-flex flex-column px-2">
                    <p class="m-0 text-black-50">reservation date</p>
                    <span>20/09/2010</span>
                </div>

                <div class=" d-flex flex-column px-2">
                    <p class="m-0 text-black-50">price</p>
                    <span>1211 SR</span>
                </div>
             </div>


    </a>

    <a data-bs-toggle="modal" href="#waitingwithrequest" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
              </div>

              <p class="status orange" data-color="C4C3C3">waiting<i class="fa-solid fa-circle px-2 "></i></p>
            </div>
            <div class="d-flex ">
                <div class=" d-flex flex-column px-2">
                    <p class="m-0 text-black-50">reservation date</p>
                    <span>20/09/2010</span>
                </div>
                <div class=" d-flex flex-column px-2">
                    <p class="m-0 text-black-50">price</p>
                    <span>1211 SR</span>
                </div>
             </div>


    </a>
    <a data-bs-toggle="modal" href="#waitingonly" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
              </div>

              <p class="status orange" data-color="C4C3C3">waiting<i class="fa-solid fa-circle px-2 "></i></p>
            </div>

            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>

                <div class=" d-flex flex-column px-2">
                    <p class="m-0">price</p>
                    <span>1211 SR</span>
                </div>
             </div>


    </a>

    <a data-bs-toggle="modal" href="#frelancerreservationinprogress" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
              </div>

              <p class="status orange" data-color="C4C3C3">in progress<i class="fa-solid fa-circle px-2 "></i></p>
            </div>

            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>
                {{-- <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span class="deadline">20/09/2010</span>
                </div> --}}
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">price</p>
                    <span>1211 SR</span>
                </div>
             </div>


    </a>
    <a data-bs-toggle="modal" href="#freelancerreservationfinished" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
              </div>

              <p class="status finish" data-color="C4C3C3">finish<i class="fa-solid fa-circle px-2 finish "></i></p>

            </div>
            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>
                {{-- <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span>20/09/2010</span>
                </div> --}}
                <div class=" d-flex flex-column px-2">
                    <p class="m-0">price</p>
                    <span>1211 SR</span>
                </div>
             </div>


    </a>
    <a data-bs-toggle="modal" href="#freelancerreservationcompleted" role="button"class="request  d-flex flex-column px-3 py-3 position-relative mb-5">
        <div class="d-flex justify-content-between align-items-baseline " style="margin-bottom: 35px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h3 class="reservation-id">#3412312</h3>
              </div>

              <p class="status text-black" data-color="C4C3C3">complete<i class="fa-solid fa-circle px-2 text-black "></i></p>
            </div>
            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                   <p class="m-0">req.date</p>
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
