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
.edit{
    position: absolute;
    top: 20px;
    right: 20px;
    background-color: #ffffffd9;
    color: #312f2f;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    font-size: 20px;
}


.card{
    box-shadow: none;
}

.products-page .container-fluid .product-table {
    width: 100%;
}
.products-page .container-fluid .product-table .products {
    width: 100%;
    display: flex;
    justify-content:flex-start;
}
</style>
@endsection


@section("content")
<a class="addrequesticon" href="#">
<i class="fa-solid fa-plus"></i>
</a>
  <div class="products-page">
        <div class="container-fluid  px-5 d-flex  flex-column">
            <div class="section-header">
                <h2>photos</h2>
                
            </div>
          <div class="product-table" >
             
               <div class="products">

                <a class="card" href="{{route("freelanc.addphoto")}}"> 
                    <div class="image-product " style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: #CDCDCD;
                    background-color: #F8F8F8;
                    border-radius: 18px;
                    display: flex;
                     flex-direction: column;
                ">
                                
                                        <i class="fa fa-add " style="
                    font-size: 70px;
                    
                "></i>
                             <p>add new photo</p>           
                                        </div>
                            <div class="card-body">
                               
                            </div>
                 </a>
                <div class="card">
                  <div class="image-product">
                     <img src="https://media.architecturaldigest.com/photos/57c7003fdc03716f7c8289dd/master/pass/IMG%20Worlds%20of%20Adventure%20-%201.jpg" class="card-img-top" alt="product image">
                     <a href="{{route("freelanc.editphoto")}}"class="edit">
                        <i class="fa fa-pencil"></i>
                     </a>
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
 


@endsection

@section("js")
    
@endsection