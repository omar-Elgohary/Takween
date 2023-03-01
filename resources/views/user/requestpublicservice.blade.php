@extends("layouts.home.index")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
home
@endsection
@section("header")
@endsection

@section("css")

@endsection
@section("nosearch","none !important")

@section("content")

<div class="requestservice">
    <div class="container">
        <div class="form px-3">

            <div class="section-header">
                <h2>request service</h2>
            </div>

            <form action="{{ route('user.request.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="inputName">Category</label>
                    <select name="category_id" id="category_id" class="form-control SlectBox" onclick="console.log($(this).val())"
                        onchange="console.log('change is firing')">
                        <option value="" selected disabled>Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->title_en }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="inputName" class="pb-2">Service</label>
                    <select name="service_id" id="service_id" class="form-control">
                    </select>
                </div>

                <div class="mb-4">
                    <label for="title" class="form-label pd-2">title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="persentation title">
                </div>

                <div class="mb-4">
                    <h5 class="form-label pd-2">attachment</h5>
                    <div class="d-flex flex-column flex-nowrap ">
                        <span class="text-danger py-4">Maximun upload 200 kB*</span>
                        <div class="d-flex">
                            <label for="attachment" class="download">
                                <i class="fa-solid fa-arrow-down"></i>
                            </label>
                            <input type="file" class="form-control" id="attachment" name="attachment" placeholder="persentation title">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label mb-3">description</label>
                    <textarea class="form-control w-100" id="description" placeholder="descripe" rows="3" name="discription"></textarea>
                </div>

                <div class="mb-4">
                    <label for="date" class="form-label mb-3">due date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date">
                </div>

                <button type="submit" class="btn btn-modal my-3 px-5 btn-model-primary ">request</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var CategoryId = $(this).val();
            if (CategoryId) {
                $.ajax({
                    url: "{{ URL('user/category') }}/" + CategoryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#service_id').empty();
                        $.each(data, function(key, value) {
                            $('#service_id').append('<option value="' +
                                value + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
