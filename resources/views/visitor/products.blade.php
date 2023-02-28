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

@endsection
@section("content")

<a class="addrequesticon" href="{{route('user.requestpublic')}}">
    <i class="fa-solid fa-plus"></i>
</a>

<div class="products-page">
    <div class="container-fluid d-flex ">
        <div class="category-table">
            <h4>Categories</h4>
            @foreach ($categories as $category)
                <ul class="category">
                    <li><a href="#">{{ $category->title_en }}</a></li>
                </ul>
            @endforeach

            <h4>Services</h4>
            <ul class="subcategorys">
                <li class="d-flex"><button type="button" id="closesubcategory">
                    <i class="fa fa-arrow-left"></i>
                   </button></li>
            @foreach ($services as $service)
                
                    <li><a href="#">{{ $service->service_en }}</a></li>
                </ul>
            @endforeach
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
                        <input type="checkbox" name="productsearch" value="newest" id="newest">
                        <label for="newest" class="bold" >newest</label>
                    </div>

                    <div>
                        <input type="checkbox" name="productsearch" value="highestrating" id="highestrating">
                        <label for="highestrating"class="bold" >highest rating</label>
                    </div>

                    <div>
                        <input type="checkbox" name="productsearch" value="pricelowtoheight"id="pricelowtoheight" >
                        <label for="pricelowtoheight"class="bold" >price lower to high</label>
                    </div>

                    <div class="btn-contianer d-flex justify-content-center align-items-center">
                        <button type="submit" class=" border-0 btn-modal  my-3 btn-model-primary ">apply</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="products">
            @foreach ($products as $product)
                <div class="card">
                    <div class="image-product">
                        <img src="{{asset('front/upload/product/images/'.$product->img1) }}" class="card-img-top" alt="product image">
                        <button class="hart"><i class="fa fa-heart"></i></button>
                        <button class="addtochart">add to cart</button>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <div class="freelancer-info d-flex align-items-center ">
                            <div class="image">
                                <img src="{{ 'Admin3/assets/images/users/'.\App\Models\User::where('id', $product->freelancer_id)->first()->profile_image }}" alt="">
                            </div>
                            <p class="card-text">{{ \App\Models\User::where('id', $product->freelancer_id)->first()->name }}</p>
                        </div>

                        <div class="prod-likes">
                            <i class="fa-solid fa-heart align-self-center"></i>
                            <span>{{$product->likes->count()}}</span>
                        </div>
                    </div>
                </div> <!-- card -->
            @endforeach
            </div>
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
@endsection
