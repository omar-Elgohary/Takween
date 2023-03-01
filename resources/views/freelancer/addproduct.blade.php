@extends("layouts.home.index")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
edit product
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
        <h2>add product</h2>
    </div>

    <form action="{{route('freelanc.product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="category_id"> category</label>
            <select name="category_id" id="category_id" class="form-control @error('service_id') is-invalid @enderror">
                <option value="">Select categroy</option>
                @forelse ( $categories as $category )
                    <option value="{{$category->id}}">{{$category->title_en}}</option>
                @empty
                    <option value="">no data</option>
                @endforelse
            </select>
                @error('category_id')
                    <span class="text-red">{{$message}}</span>
                @enderror
        </div>

        <div class="mb-4">
            <label for="service_id" class="pb-2">service</label>
            <select name="service_id" id="service_id" name="service"class="form-control @error('service_id') is-invalid @enderror">
            <option value="">select service</option>
            </select>
            @error('service_id')
                <span class="text-red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="prodname" class="form-label pd-2">product name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="prodname"  value='{{old('name')}}' name="name"placeholder="e.g wedding card">
            @error('name')
            <span class="text-red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="form-label pd-2">price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" value='{{old('price')}}' name="price" placeholder="50 S.R">
            @error('price')
            <span class="text-red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label mb-3">description</label>
            <input  class="form-control @error('description') is-invalid @enderror " id="description" placeholder="Write product description" value='{{old('discription')}}' name="discription">
            @error('description')
            <span class="text-red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="proprety" class="form-label mb-3 " id>properties</label>
            <div id="properties">
                <input  class="form-control " id="proprety" placeholder="Write product proprets"  name="property">
            </div>
        </div>

        <div class="mb-4">
            <h5  class="form-label pd-2">attachment</h5>
            <div class="d-flex flex-column flex-nowrap ">
                <span class="py-4">Maximun upload 200 kB</span>
                <div class="d-flex">
                    <label for="attachment" class="download">
                    <i class="fa-solid fa-arrow-down"></i></label>
                    <input type="file" @error('file') is-invalid @enderror class="form-control" id="attachment" name="file" value='{{old('file')}}'placeholder="persentation title">
                    @error('file')
                        <span class="text-red">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-4">
            <h5  class="form-label pd-2">product pictures</h5>
            <div class="d-flex flex-column flex-nowrap ">
                <span class="py-4">Maximun 3 pictures</span>
                <div class="d-flex">
                    <div class="d-flex">
                        <label for="attachment2" class="download">
                            <i class="fa-regular fa-image"></i></label>
                    <input type="file" class="form-control @error('img1') is-invalid @enderror" id="attachment2" name="img1"value='{{old('img1')}}' placeholder="persentation title">
                    </div>
                    <div class="d-flex">
                        <label for="attachment3" class="download">
                            <i class="fa-regular fa-image"></i></label>
                    <input type="file" class="form-control @error('img2') is-invalid @enderror" id="attachment3" name="img2" value='{{old('img2')}}' placeholder="persentation title">
                    </div>
                    <div class="d-flex">
                        <label for="attachment4" class="download">
                            <i class="fa-regular fa-image"></i></label>
                    <input type="file" class="form-control @error('img3') is-invalid @enderror" id="attachment4" name="img3" value='{{old('img3')}}' placeholder="persentation title">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn  btn-modal  my-3 px-5  btn-model-primary ">add product</button>
    </form>
</div>
</div>
</div>
@endsection

@section("js")
<script >
$(document).ready(function() {
    $('#category_id').on('change', function() {
        var catId = $(this).val();
        if (catId) {
            $.ajax({
                url: "{{ URL::to('freelancer/getservice') }}/" + catId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if(data){
                    $('#service_id').removeAttr("disabled");
                    console.log($('select[name="service_id"]'))
                    $('#service_id').empty();
                    $.each(data, function(key, value) {
                        $('#service_id').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                    }else{
                        $('#service_id').append("<option value''>no service</option>")
                        $('#service_id').attr("disabled","disabled");
                    }

                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
</script>


<script>
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#properties").append(' <input class="form-control" name="addMore['+i+']"[proprity]">');
    });
    $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
    });
</script>
@endsection
