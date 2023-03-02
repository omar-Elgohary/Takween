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
    .files{
        padding-top:30px;
        padding-bottom:30px;
        flex-direction: column;
    }
    </style>
@endsection


@section("content")

<div class="files">
    <div class="container">
        <div class="files d-flex">
            <div class="section-header  p-2">
                <h2>Files </h2>
            </div>

            <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#newfile" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <span class="px-2">All Files</span>
                    </button>
                </h2>

            @foreach (App\Models\Requests::where('freelancer_id', Auth::user()->id)->get() as $request)
                <div id="newfile" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body d-flex flex-column">
                        <div class="file d-flex ">
                            <div class="details d-flex ">
                                <div class="img">
                                    <i class="fa-regular fa-file-word"></i>
                                </div>

                                <div class="info">
                                    <h3>
                                        {{ $request->attachment }}
                                    </h3>
                                    <div class="size">
                                        215kB . PDF
                                    </div>
                                </div>
                            </div>

                            <div class="tool">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("js")

@endsection
