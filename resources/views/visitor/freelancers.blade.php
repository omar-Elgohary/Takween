@extends("layouts.home.index")
@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
freelancers
@endsection
@section("header")
@endsection
@section("css")
@endsection

@section("content")
<div class="products-page">
    <div class="container-fluid d-flex ">
        <div class="category-table">
        <ul class="category">
            <li><a href="">categories</a></li>
            <li><a href="">categories</a></li>
            <li><a href="">categories</a></li>
            <li><a href="">categories</a></li>

        </ul>
            <ul class="subcategorys">
            <li><a href="">categories</a></li>
            <li><a href="">categories</a></li>
            <li><a href="">categories</a></li>
            <li><a href="">categories</a></li>
        </ul>
        </div>

        <div class="product-table" >
        <div class="filtercontainer d-flex align-items-baseline justify-content-start mb-2">
            <div class="filter d-flex align-items-baseline">
            <button class=" filter-button btn d-flex align-items-center justify-content-between">
                <i class="fa-solid fa-arrow-up-wide-short"></i>
                <span >sort by:</span>
            </button>

            <span class=" px-2">All</span>
            </div>

            <div class="filter-items">
            <form action="">
                <div>
                    <input type="checkbox" name="productsearch" value="highestrating" id="highestrating">
                    <label for="highestrating"class="bold" >highest rating</label>
                </div>

                <div>
                    <input type="checkbox" name="productsearch" value="moreproject"id="moreproject" >
                    <label for="moreproject"class="bold" >more project</label>
                </div>

                <div class="btn-contianer d-flex justify-content-center align-items-center">
                    <button type="submit" class=" border-0 btn-modal  my-3 btn-model-primary ">apply</button>
                </div>
            </form>
            </div>
        </div>

    @foreach ($freelancers as $freelancer)
        <a class="freelanc" href="{{route("freelancer")}}">
            <div class="image">
                <img src="{{ asset("Admin3/assets/images/users/".$freelancer->profile_image) }}" alt="">
            </div>

            <div class="info">
                <div class="name">
                    <span>{{ $freelancer->name }}</span>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <span>4,5</span>
                    </div>
                </div>

                <div class="txt">{{ $freelancer->bio }}</div>
                <div class="service">
                    <p>service :</p>
                    <ul>
                    <li>
                        logo
                    </li>
                    <li>
                        logo
                    </li>
                    <li>
                        logo
                    </li>
                    </ul>
                </div>
            </div>

            <div class="totals">
                <div class="projects">
                    <i class="fa-solid fa-list-check"></i>
                    <p>14<sub>projects</sub></p>
                </div>

                <div class="productstotal">
                    <i class="fa-solid fa-dollar-sign"></i>
                    <p>{{ Product::where('')->count }}<sub>products</sub></p>
                </div>

                <div class="photos">
                    <i class="fa-solid fa-image"></i>
                    <p>14  <sub>photos</sub></p>
                </div>
            </div>
        </a>
    @endforeach

        </div>
    </div>
</div>
@endsection

@section("js")
    <script>
        $(".filter-button").click(function(){
            console.log("heool");
            $(".filter-items").toggle();
        });
    </script>
@endsection
