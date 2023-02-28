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
.product-detail .row{
    flex-grow: 1;
    
}
.product-detail {
    width: 100%;

}

</style>

<link href="{{asset('assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section("nosearch","none !important")

@section("content")

  <div class="product-page">
        <div class="container d-flex flex-column ">
            <div class="header d-flex align-items-center">
                <div class="title">
                    
                    <div class="info d-flex flex-column  ">
                        <h2 class="bold text-black">photo name </h2>
                       
                        <div class="freelancer-info d-flex ">
                            <div class="d-flex ">
                                <div class="image">
                              <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
                            </div>
                             <p class="card-text ">freelancer name <span class="text-black-50 px-2">|</span></p>
                          </div>
                          <div  class="freelacer-rate">
                              <i class="fa-solid fa-star align-self-center"></i>
                              <span>3,2</span>
                          </div>
                            </div>
                              
                    </div>
                </div>
                
                <div class="service d-flex justify-content-end  flex-1">
                    <div class="serv d-flex align-items-center">
                        <div  class="prod-likes withborder py-2 px-3 rounded-pill">
                                      <i class="fa-solid fa-heart align-self-center"></i>
                                      <span>123</span>
                                  </div>
    
                                  <form action="">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addcart"class="btn  btn-modal  my-3 btn-model-primary">add to chart</button>
                                  </form>
                    </div>
                    
                 </div>

            </div>

<div class="contentporduct row  ">
             
    <div class = "card-wrapper  col-lg-5 col-md-6 col-sm-12 ">
      <div class = "card ">
        <!-- card left -->
        <div class = "product-imgs d-flex">
            <div class="product-detail">
              {{--  --}}

              <div class="card">
                <div class="card-body photo-card-body">
                    <div class="popup-gallery">
                        <div class="row">

                            <div class="col-12">
                                <a href="{{asset('assets/images/Component5.png')}}" title="">
                                    <div class="img-fluid d-flex justify-content-end">
                                        <img src="{{asset('assets/images/Component5.png')}}" alt="" class="img-fluid d-block">
                                    </div>
                                </a>
                            </div>
                            </div>
                    </div>
                   
                    </div>
                </div>
            

              {{--  --}}
            </div>
        </div>
      </div>
    </div>
                <div class="description  col-lg-7 col-md-6 col-sm-12  d-flex flex-column ">
                    <div class="price bold fs-3">53<span class="curancy fs-6">
                        S.R
                    </span>

                    </div>
                    <div class="body">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam culpa reprehenderit veniam sequi, exercitationem ipsum voluptates sed, soluta et voluptate perspiciatis distinctio quaerat aut. Rem autem aut illum eveniet voluptatibus.
                    </div>
                    <div class="proprity py-4" >
                        <h2  class="bold">proprities</h2>
                        <ul >
                            <li>camera: canon</li>
                            <li>camra lens:14322px </li>
                            <li>size: 1700 1200 px</li>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>

            
            <div class="similar ">
                <div class="section-header d-flex  ">
            <h2 class="me-auto">similar products</h2>

            <a href="#" class="flex-1">See all</a>
            </div>
            <div class="product-table">
            <div class="row">
              <div class="card-container col-xs-12 col-sm-6 col-md-4 col-lg-3" >
                <div class="card">
                  <div class="image-product">
                     <img src="https://media.architecturaldigest.com/photos/57c7003fdc03716f7c8289dd/master/pass/IMG%20Worlds%20of%20Adventure%20-%201.jpg" class="card-img-top" alt="product image">
                     <button class="hart ">
                      <i class="fa fa-heart"></i>
                     </button>
                     <button class="addtochart">
                      add to cart
                     </button>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title">product name</h5>
                       
                        <div  class="prod-likes ">
                            <i class="fa-solid fa-heart align-self-center"></i>
                            <span>123</span>
                        </div>
                      
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
<script src="{{asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<!-- lightbox init js-->
<script src="{{asset('assets/js/pages/lightbox.init.js')}}"></script>

@endsection