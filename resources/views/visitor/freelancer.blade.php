@extends("layouts.home.index")
@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
freelanser name
@endsection
@section("header")
@endsection
@section("css")
@endsection

@section("content")

<a class="addrequesticon" href="#chooseservice" data-bs-toggle="modal">
    <i class="fa-solid fa-plus"></i>
</a>

<div class="products-page py-5">
    <div class="container">
        <section class="freelanc v2" >
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
            </div>

            <div class="totals">
                <div class="projects">
                    <i class="fa-solid fa-list-check"></i>
                    <p>{{ App\Models\Requests::where('freelancer_id', $freelancer->id)->count() }}<sub>projects</sub></p>
                </div>

                <div class="productstotal">
                    <i class="fa-solid fa-dollar-sign"></i>
                    <p>{{ App\Models\Product::where('freelancer_id', $freelancer->id)->count() }}<sub>products</sub></p>
                </div>

                <div class="photos">
                    <i class="fa-solid fa-image"></i>
                    <p>{{ App\Models\Photo::where('freelancer_id', $freelancer->id)->count() }}<sub>photos</sub></p>
                </div>
            </div>
        </section>
    </div>

    <div class="categories pt-5 ms-3 ccs">
        <div class="container-fluid py-5  px-3 scrollable-container">
            <div class="section-header">
                <h2>products</h2>
            </div>

            <div class="products productscroll">
                @foreach ($products as $product)
                    <div class="card">
                        <div class="image-product">
                            <img src="{{ asset('assets/images/product/'.$product->img1) }}" class="card-img-top" alt="product image">

                            <button class="hart ">
                                <i class="fa fa-heart"></i>
                            </button>

                            <button class="addtochart">
                                add to cart
                            </button>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="freelancer-info d-flex align-items-center ">
                                <div class="image">
                                    <img src="{{ asset("Admin3/assets/images/users/".$freelancer->profile_image) }}" alt="">
                                </div>
                                <p class="card-text">{{ $freelancer->name }}</p>
                            </div>

                            <div  class="prod-likes ">
                                <i class="fa-solid fa-heart align-self-center"></i>
                                <span>123</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="categories ccs ms-3">
    <div class="container-fluid py-2 px-3 scrollable-container">
        <div class="section-header">
            <h2>photos</h2>
        </div>

        <div class="products productscroll">
            @foreach ($photos as $photo)
                <div class="card">
                    <div class="image-product">
                        <img src="{{ asset('assets/images/photo/'.$photo->photo) }}" class="card-img-top" alt="Photo">

                        <button class="hart ">
                            <i class="fa fa-heart"></i>
                        </button>

                        <button class="addtochart">
                            add to cart
                        </button>
                    </div>

                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title">{{ $photo->name }}</h5>

                        <div  class="prod-likes ">
                            <i class="fa-solid fa-heart align-self-center"></i>
                            <span>123</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



<div class="reviews">
<div class="container-fluid d-block">

    <div class="section-header px-4">
        <h2 class="text-black "> reviews <span class="text-black">(1234)</span></h2>

    </div>

    <div class="review freelanc ">

            <div class="image">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
            </div>
            <div class="info">
                <div class="name">
                <span>ahmed</span>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>
                </div>
                <div class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam velit alias ratione eaque dolores expedita ex repellat ducimus. Ratione quisquam molestiae iusto minima obcaecati tenetur delectus ex ipsam doloribus nulla.</div>

            </div>
    </div>
    <div class="review freelanc ">

            <div class="image">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
            </div>
            <div class="info">
                <div class="name">
                <span>ahmed</span>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>
                </div>
                <div class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam velit alias ratione eaque dolores expedita ex repellat ducimus. Ratione quisquam molestiae iusto minima obcaecati tenetur delectus ex ipsam doloribus nulla.</div>

            </div>
    </div>
    <div class="review freelanc ">
            <div class="image">
                <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
            </div>

            <div class="info">
                <div class="name">
                <span>ahmed</span>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>
                </div>
                <div class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam velit alias ratione eaque dolores expedita ex repellat ducimus. Ratione quisquam molestiae iusto minima obcaecati tenetur delectus ex ipsam doloribus nulla.</div>
            </div>
    </div>
            <a href="" class=" text-center showmore">show more</a>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade " id="chooseservice" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
        </div>

        <div class="modal-body">
            <form id="form-chooserequest">
                <h1 class="modal-title fs-5" >Request service</h1>

                <div>
                    <input type="radio" value="private" id="private" name="requesttype">
                    <label for="private">Request new service </label>
                </div>

                <div>
                    <input type="radio" value="reservation" id="reservation" name="requesttype">
                    <label for="reservation">Booking for photo shot</label>
                </div>

                <div class="btn-contianer d-flex  justify-content-between  align-items-center my-3">
                    <button class="  btn-modal modal-color-text border-0" data-bs-dismiss="modal" type="button">move back</button>
                    <button class=" btn-modal btn-model-primary  border-0" type="submit">apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section("js")

@endsection
