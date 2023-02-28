@extends("layouts.home.index")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
carts
@endsection
@section("header")
@endsection


@section("css")
<style>

    .container-fluid{
        padding: 0 40px;
    }

    .chartitem img{
        width:220px;
    }
</style>
@endsection

@section("nosearch","none !important")
@section("content")
@extends("layouts.component.modal.userRequests.payment")
<div class="charts">
    <div class="container-fluid">
         <div class="section-header ">
            <h2>shopping chart </h2>
        </div>


       @if (true)
              <div class=" chart-container d-flex flex-column flex-md-row ">
             <div class="chartsitems ">
                 
                   
                <div class="chartitem row justify-content-center align-items-center g-2">
                    <div class="col">
                        <img src="{{asset("assets/images/Component5.png")}}" alt="">
                    </div>
                    <div class="col">
                        <h4>product name</h4>
                        <p>123 <span>S.R</span></p>
                    </div>
                    <div class="col">
                        <form action="">
                            @csrf
                            @method("delete")
                            <button type="submit" class="bg-white border-0"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                       
                    </div>
                </div>
                
                   
                <div class="chartitem row justify-content-center align-items-center g-2">
                    <div class="col">
                        <img src="{{asset("assets/images/Component5.png")}}" alt="">
                    </div>
                    <div class="col">
                        <h4>product name</h4>
                        <p>123 <span>S.R</span></p>
                    </div>
                    <div class="col">
                        <form action="">
                            @csrf
                            @method("delete")
                            <button type="submit" class="bg-white border-0"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                       
                    </div>
                </div>
                
                   
                <div class="chartitem row justify-content-center align-items-center g-2">
                    <div class="col">
                        <img src="{{asset("assets/images/Component5.png")}}" alt="">
                    </div>
                    <div class="col">
                        <h4>product name</h4>
                        <p>123 <span>S.R</span></p>
                    </div>
                    <div class="col">
                        <form action="">
                            @csrf
                            @method("delete")
                            <button type="submit" class="bg-white border-0"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                       
                    </div>
                </div>
                
                   
                <div class="chartitem row justify-content-center align-items-center g-2">
                    <div class="col">
                        <img src="{{asset("assets/images/Component5.png")}}" alt="">
                    </div>
                    <div class="col">
                        <h4>product name</h4>
                        <p>123 <span>S.R</span></p>
                    </div>
                    <div class="col">
                        <form action="">
                            @csrf
                            @method("delete")
                            <button type="submit" class="bg-white border-0"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                       
                    </div>
                </div>
                
                   
                <div class="chartitem row justify-content-center align-items-center g-2">
                    <div class="col">
                        <img src="{{asset("assets/images/Component5.png")}}" alt="">
                    </div>
                    <div class="col">
                        <h4>product name</h4>
                        <p>123 <span>S.R</span></p>
                    </div>
                    <div class="col">
                        <form action="">
                            @csrf
                            @method("delete")
                            <button type="submit" class="bg-white border-0"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                       
                    </div>
                </div>
                
                   
                <div class="chartitem row justify-content-center align-items-center g-2">
                    <div class="col">
                        <img src="{{asset("assets/images/Component5.png")}}" alt="">
                    </div>
                    <div class="col">
                        <h4>product name</h4>
                        <p>123 <span>S.R</span></p>
                    </div>
                    <div class="col">
                        <form action="">
                            @csrf
                            @method("delete")
                            <button type="submit" class="bg-white border-0"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                       
                    </div>
                </div>
                
           
             

        </div>
         <div class="
               chartcheckout px-2">
            <h3 class="py-2 px-3 ">order summery</h3>
             <form action=""class="copone px-3" >
               <div class="d-flex">
                <input type="text" class="form-control" id="promo" placeholder="promo code">
                <button type="submit" class="btn py-2 px-4 ms-3">
                    apply
                </button>
                
            </form>
                </div>
                 <div class="details mt-4">
                    <div class="price d-flex">
                        <p class="fs-4">price</p>
                        <div class="number ">
                            170
                            <span>S.R</span>
                        </div>
                    </div>
                    <div class="price d-flex ">
                         <p class="fs-4">discount</p>
                        <div class="number">
                            20
                            <span>%</span>
                        </div>
                    </div>
                    <div class="price d-flex">
                        <p class="fs-4">total</p>
                        <div class="number">
                           75
                            <span>S.R</span>
                        </div>
                    </div>
                    <button type="button"class="btn  btn-modal  my-3 btn-model-primary chart-out" data-bs-target="#pay" data-bs-toggle="modal">checkout</button>
                 </div>
        </div>
       
       @else
        <div class="d-flex">
              <p>your cart is empty......</p><a href="{{route("products")}}" class="linkemptycart">start shopping now</a></div>   
     
       @endif
     
  
            
               

            </div>
    </div>
</div>




@endsection

@section("js")
    
@endsection