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
@include("layouts.component.modal.userRequests.offer")
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
                <button class="filter-button btn d-flex align-items-center justify-content-between">
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
            <a href="{{route('user.showpublicrequest')}}" class="active fs-4  ">public request</a>
            <a href="{{route('user.showprivaterequest')}}" class="text-black-50 fs-4">private request</a>
        </div>


<div class="requesties d-flx flex-column pt-4">
    @foreach ($requests as $request)
    @if(!$request->freelancer_id)
        <div class="request offer d-flex flex-column px-3 py-3 position-relative mb-5">

            <a href="#offerPending{{ $request->id }}" data-bs-toggle="modal" role="button">

                <div class="d-flex justify-content-between align-items-baseline">
                    <h3>#3412312</h3>
                    <p class="status gray"data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                </div>

                <div class="d-flex ">
                    <div class="d-flex flex-column px-2">
                        <p class="m-0">req.date</p>
                        <span>20/09/2010</span>
                    </div>

                    <div class="d-flex flex-column px-2">
                        <p class="m-0">Due date</p>
                        <span>{{ $request->due_date }}</span>
                        <div>
                        </div>
                    </div>
                </div>
            </a>

            <button class="w-100 by-2 btn-noborder position-absolute " data-bs-target="#freelaceroffers" data-bs-toggle="modal"  role="button">
                offer
            </button>
        </div>

    @else

        <a href="#inprogress" data-bs-toggle="modal" class="request d-flex flex-column px-3 py-3 position-relative mb-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="frelacereq d-flex ">
                    <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" class="img-fluid rounded-top" alt="">

                    <div class="freelanereq mx-2">
                        <h3 class="fw-600">{{ App\Models\User::where('id', $request->freelancer_id)->first()->name }}</h3>
                        <span class="text-black-50">#123123</span>
                    </div>
                </div>
                @if($request->status == 'Pending')
                    <p class="status gray" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                @elseif($request->status == 'In Process')
                    <p class="status gray text-warning" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                @elseif($request->status == 'Finished')
                    <p class="status gray" style="color: rgb(214, 214, 42);" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                @elseif($request->status == 'Completed')
                    <p class="status gray text-black" data-color="C4C3C3">{{ $request->status }}<i class="fa-solid fa-circle px-2 "></i></p>
                @endif
            </div>

            <div class="d-flex ">
                <div class="d-flex flex-column px-2">
                    <p class="m-0">req.date</p>
                    <span>20/09/2010</span>
                </div>

                <div class=" d-flex flex-column px-2">
                    <p class="m-0">Due date</p>
                    <span>{{ $request->due_date }}</span>
                </div>
            </div>
        </a>
    @endif


{{-- offerPending modal --}}
<div id="offerPending{{ $request->id }}" class="modal offers fade"  aria-hidden="true" aria-labelledby="offerPendingLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header ">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="div d-flex justify-content-start px-4">
                <div class="d-flex flex-column">
                    <h3 class="mb-0 font-bold">#324234</h3>
                    <span class="text-black-50">Pending</span>
                </div>
            </div>

            <div class="d-flex flex-column px-5">
                <div class="d-flex justify-content-between">
                    <p class="mb-0">category</p>
                    <p class="fw-900 mb-0">{{ App\Models\Category::where('id', $request->category_id)->first()->title_en }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <p class=" mb-0">service</p>
                    <p class="fw-900 mb-0">{{ App\Models\Service::where('id', $request->service_id)->first()->service_en }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <p class=" mb-0" >title</p>
                    <p class="fw-900 mb-0">{{ $request->title }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <p class=" mb-0">due date</p>
                    <p class="fw-900 mb-0">{{ $request->due_date }}</p>
                </div>
            </div>

            <div class="d-flex flex-column px-3 bg-blue">
                <span class="flex-grow-1 fs-5 font-bold">description</span>
                <p class="flex-grow-1">{{ $request->description }}</p>
            </div>

        @foreach (App\Models\Requests::where('id', $request->id)->get() as $request)
            <div class="d-flex flex-column px-3">
                <p class="fs-5 font-bold">attachment</p>
                <div class="d-flex flex-column px-2 ">
                    <div class="file d-flex mb-2">
                        <div class="details d-flex ">
                            <div class="img">
                                <i class="fa-regular fa-file-word"></i>
                            </div>

                            <div class="info">
                                <p class="mb-0">{{ $request->attachment }}</p>

                                <div class="size">
                                    521kB .WORD
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

        <div class="modal-footer">
            <button class="btn  btn-modal  my-3 btn-model-primary" data-bs-target="#freelaceroffers"
                data-bs-toggle="modal" data-bs-dismiss="modal">offers
            </button>
        </div>
    </div>
</div>
</div>
@endforeach
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

    <script>
        $('#offerPending').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            console.log(button)
            var id = button.data('id')
            var category_id = button.data('category_id')
            var service_id = button.data('service_id')
            var title = button.data('title')
            var due_date = button.data('due_date')
            var description = button.data('description')
            var attachment = button.data('attachment')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #category_id').val(category_id);
            modal.find('.modal-body #service_id').val(service_id);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #due_date').val(due_date);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #attachment').val(attachment);
        })
    </script>

@endsection
