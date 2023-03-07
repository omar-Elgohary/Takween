@extends("layouts.home.index")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
profile page
@endsection
@section("header")
@endsection


@section("css")

@endsection


@section("content")
@include("layouts.component.modal.updateuserprofile")
@include("layouts.component.modal.cashout")

<div class="userprofile">
    <div class="container">
        <div class="section-header ">
            <h2>user profile </h2>
        </div>

        <div class="row personinfo">
            <div class="col-6">
                <div class="d-flex">
                    <div class="profimg">
                        <img src="{{ asset("Admin3/assets/images/users/".Auth::user()->profile_image) }}" alt="" class="rounded-circle">
                    </div>

                    <div class="d-flex flex-column px-3">
                        <h3 class="fw-900 text-black">{{ Auth::user()->name }}</h3>
                        <span class="text-black-50">{{ Auth::user()->email }}</span>
                        <span class="text-black-50">{{ Auth::user()->phone }}</span>
                    </div>
                </div>
            </div>

            <div class="col-6 d-flex justify-content-end">
                <button  class="btn1" data-bs-toggle="modal" href="#edituserprofile" role="button">
                        <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </div>
        </div>

        <div class="waltinfo d-flex flex-sm-wrap">
            <div class="flex-grow-1 cash">
                <div class="section-header ">
                    <h2>wallet </h2>
                </div>

                <div class="hoverdiv d-flex justify-content-around align-items-baseline py-3" >
                    <div class="wall d-flex flex-column">
                        <p class="total">Total</p>
                        <P class="number">127<span>
                            SR
                        </span>
                            </P>
                    </div>
                    <button class="btn" data-bs-target="#cashout" data-bs-toggle="modal" type="button">cashout</button>
                </div>
            </div>

            <div class="flex-grow-1 hestory">
                <div class="section-header ">
                    <h2>wallet history </h2>
                </div>

                <div class="hest mx-2">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header d-flex align-items-center justify-content-between p-2" id="panelsStayOpen-headingOne">
                    <div  class= "info d-flex flex-column">
                    <p class="text-black-100 p-0 m-0">refund</p>
                    <p class="text-black-50">2/8/2202</p>
                </div>

                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#refund1" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <div class="number">+
                        <span>150</span>
                        <span>RS</span>
                    </div>
                </button>
            </h2>

        <div id="refund1" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <strong>This is the first item's accordion body.</strong>  that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<div class="files d-flex">
    <div class="section-header width-0 p-2">
        <h2>Files</h2>
    </div>

<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#newfile" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                <span class="px-2">New</span>
            </button>
        </h2>

    <div id="newfile" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
        <div class="accordion-body d-flex flex-column">
            <div class="file d-flex ">
                <div class="details d-flex ">
                    <div class="img">
                        <i class="fa-regular fa-file-word"></i>
                    </div>

                    <div class="info">
                        <h3>{{ App\Models\Requests::where('user_id', Auth::user()->id)->first()->attachment }}</h3>
                        <div class="size">
                            521kB . PDF
                        </div>
                    </div>
                </div>

                <div class="tool">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection

@section("js")

@endsection
