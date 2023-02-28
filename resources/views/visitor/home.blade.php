@extends("layouts.home.homepage")

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

@section("content")

<a class="addrequesticon" href="{{route('user.requestpublic')}}">
    <i class="fa-solid fa-plus"></i>
</a>

<div class="messages pt-3">
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-4 message d-flex flex-column align-items-center justify-content-center text-center mb-5">
               <img src="{{asset("assets/images/20943451.png")}}" alt="" class="w-50 mx-auto mb-3" >
               <div class="text">
                <h3 class="fw-bold text-uppercase"> message 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora accusamus cum a tempore alias veritatis repudiandae in fugiat. Nemo dicta vitae aliquam, eius aperiam qui corporis enim voluptas molestias in!</p>
               </div>
            </div>
            <div class="col-lg-4 message d-flex flex-column align-items-center justify-content-center text-center mb-5">
               <img src="{{asset("assets/images/8055.png")}}" alt="" class="w-50 mx-auto mb-3" >
               <div class="text">
                <h3 class="fw-bold text-uppercase">message 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora accusamus cum a tempore alias veritatis repudiandae in fugiat. Nemo dicta vitae aliquam, eius aperiam qui corporis enim voluptas molestias in!</p>
               </div>
            </div>
            <div class="col-lg-4 message d-flex flex-column align-items-center justify-content-center text-center mb-5">
               <img src="{{asset("assets/images/Wavy_Bus-15_Single-06.png")}}" alt="" class="w-50 mx-auto mb-3" >
               <div class="text">
                <h3 class="fw-bold text-uppercase"> message 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora accusamus cum a tempore alias veritatis repudiandae in fugiat. Nemo dicta vitae aliquam, eius aperiam qui corporis enim voluptas molestias in!</p>
               </div>
            </div>
        </div>
    </div>
</div>



<div class="categories pt-3">
    <div class="container py-3 scrollable-container">
        <div class="section-header">
            <h2>categories</h2>
            <a href="#">See all</a>
        </div>

        <button class="pre-btn"></button>
        <button class="nxt-btn"></button>

        <div class="scrollable d-flex" >
            @foreach ($categories as $category)
                <div class="category ">
                    <div class="image"><i class="fa {{ $category->icon }}"></i></div>
                    <p>{{ $category->title_en }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div> <!-- End Category Section -->

<div class="freelancers pt-3">
    <div class="container py-3 scrollable-container">
        <div class="section-header">
            <h2>Top freelancers</h2>

            <a href="#">See all</a>
        </div>

          <button class="pre-btn"></button>
        <button class="nxt-btn"></button>
        <div class="scrollable">
            <div class="freelancer ">
                <div class="image">
                    <img src="{{asset("assets//images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                </div>
                <div class="info">
                    <div class="name text-capitalize">ahmed</div>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <div class="rate-precntage">3,4</div>
                    </div>
                </div>
            </div>
            <div class="freelancer ">
                <div class="image">
                    <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                </div>
                <div class="info">
                    <div class="name text-capitalize">ahmed</div>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <div class="rate-precntage">3,4</div>
                    </div>
                </div>
            </div>
            <div class="freelancer ">
                <div class="image">
                    <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                </div>
                <div class="info">
                    <div class="name text-capitalize">ahmed</div>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <div class="rate-precntage">3,4</div>
                    </div>
                </div>
            </div>
            <div class="freelancer ">
                <div class="image">
                    <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                </div>
                <div class="info">
                    <div class="name text-capitalize">ahmed</div>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <div class="rate-precntage">3,4</div>
                    </div>
                </div>
            </div>
            <div class="freelancer ">
                <div class="image">
                    <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                </div>
                <div class="info">
                    <div class="name text-capitalize">ahmed</div>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <div class="rate-precntage">3,4</div>
                    </div>
                </div>
            </div>
            <div class="freelancer ">
                <div class="image">
                    <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                </div>
                <div class="info">
                    <div class="name text-capitalize">ahmed</div>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <div class="rate-precntage">3,4</div>
                    </div>
                </div>
            </div>

            <div class="freelancer ">
                <div class="image">
                    <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                </div>

                <div class="info">
                    <div class="name text-capitalize">ahmed</div>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <div class="rate-precntage">3,4</div>
                    </div>
                </div>
            </div>

            <div class="freelancer ">
                <div class="image">
                    <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                </div>

                <div class="info">
                    <div class="name text-capitalize">ahmed</div>
                    <div class="rate">
                        <i class="fa fa-star"></i>
                        <div class="rate-precntage">3,4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end freelnce -->

<!-- start about us -->
<div class="abouts pt-3">
    <div class="container py-3">
        <div class="section-header">
            <h2>about us</h2>
        </div>
        <div class="about-data">
            <img src="{{asset("assets/images/Group 10818.png")}}" alt="">

            <div class="about-text ">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis a, pariatur tempora perspiciatis perferendis facilis porro illo exercitationem voluptatibus saepe quibusdam cumque ea quas dolor cum, velit in veniam voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo veritatis, inventore quia quisquam dolorem illum molestias facere sint corrupti ullam dolores iusto! Pariatur sed laborum non earum nostrum. Recusandae, incidunt!
            </div>
        </div>
    </div>
</div><!-- end about us -->


<!-- start contact us -->
<div class="contacts pt-3">
    <div class="container py-3">
        <div class="section-header">
            <h2>contact us</h2>
        </div>

        <div class="row">
            <div class="form-contact col-12 col-lg-6 col-md-6">
                <form action="">
                    <div class="input-group mb-3 d-flex flex-column">
                        <label for="phone">phone number</label>
                        <input class="form-control w-100" type="text" placeholder="05XXXXXXXX">
                    </div>

                    <div class="input-group mb-3 d-flex flex-column">
                        <label for="phone">subject</label>
                        <input  class="form-control w-100" type="text"placeholder="Subject">
                    </div>

                    <div class="input-group mb-3 d-flex flex-column">
                        <label for="phone" >message</label>
                        <input class="form-control w-100" place-holder="Write your message here" type="text">
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill">send</button>
                    </form>
                </div>

                <div class="col-6 contact-img">
                    <img src="{{asset("assets/images/Messages-rafiki.png")}}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection
