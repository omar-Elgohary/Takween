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

<style>
  .hlafwidth{
   max-width:400px;
  }

  .fullwidth{
    width:100%;
  }

  .form{
    max-width:100% !important;
    font-size: 22px;
  }

  /* .form label ,.form h5, .form input[placeholder]{
    font-size: 22px;
  } */

  .requestservice .container .form form button[type="submit"] {
    position: relative;
    left: 0;
    width:200px;
}

.requestservice .container .form form button[type="submit"] +button{
    width:200px;  
}
label{
    font-weight: 600; 
}

label span{
    font-weight: 300;
}

.location{
    position: relative;

}
.search{
    position: absolute;
    top:0;
    right:0;
    background-color: #fff;
    color: #C0C0C0;
    border: none;
}
</style>
@endsection

@section("nosearch","none !important")
@section("content")
    

<div class="requestservice">
<div class="container">

<div class="form px-3">
    <div class="section-header">
            <h2>edit photo</h2>
        </div>
    <form action="" method="">
     
        <div class="mb-4 hlafwidth">

            <h5  class="form-label pd-2">upload photo</h5>
            <div class="d-flex flex-column flex-nowrap ">
              <span class="py-4">Maximun upload 200 kB</span>
          <div class="d-flex">
              <label for="attachment" class="download"> 
          <i class="fa-solid fa-arrow-down"></i></label>
            <input type="file" class="form-control" id="attachment" name="attachment" placeholder="persentation title">
          </div>
            
            </div>
            
          </div>
       <div class="mb-4 hlafwidth">
  <label for="prodname" class="form-label pd-2">photo name</label>
  <input type="text" class="form-control" id="photoname"  name="productname"placeholder="e.g wedding card">
</div>

<div class="mb-4 fullwidth">
    <label for="description" class="form-label mb-3">description</label>
    <input  class="form-control " id="description" placeholder="Write photo description"  name="discription">
  </div> 

  <div class="mb-4 hlafwidth">
    <label for="camera" class="form-label pd-2">camera brand<span>(optional)</span></label>
    <input type="text" class="form-control" id="camera"  name="camera"placeholder="e.g wedding card">
  </div>
<div class="mb-4 hlafwidth">
    <label for="lens" class="form-label mb-3 " id>lens type <span>(optional)</span></label>
    <input  class="form-control " id="lens" placeholder="e.g 70-200 mm"  name="lens">
  </div> 
<div class="mb-4 hlafwidth">
    <label for="lens" class="form-label mb-3 " id>size</label>
    <div class="d-flex justify-content-between">
        <input  class="form-control w-25" id="lenswidth" placeholder="width"  name="lens">
        <input  class="form-control w-25" id="lensheight" placeholder="height"  name="lens">
        
    </div>
  </div> 
  <div class="mb-4 hlafwidth">
    <label for="category">size type </label>
     <select name="sizetype" id="sizetype"class="form-select" aria-label="Default select example">
         <option value=""></option>
         <option value=""></option>
         <option value=""></option>
     </select>
    </div>

    <div class="mb-4 hlafwidth">
        <label for="lens" class="form-label mb-3 " id>location<span>(optional)</span></label>
        <div class="location" >
            <input  class="form-control " id="lens" placeholder="Search"  name="lens">
            <button class="search">
                <i class="fa fa-search"
                ></i>
            </button>
        </div>
      </div>


      <div class="d-flex justify-content-center align-items-center flex-column ">

        <button type="submit" class="btn  btn-modal  my-3 px-5  btn-model-primary position-none ">edit photo</button>
     
        <button type="button" class="btn  modal-color-text  d-block my-3 px-5 "  data-bs-toggle="modal" data-bs-target="#suredeletephoto">delete photo</button>


      </div>
 
     


    </form>

</div>

</div>

</div>
<div class="modal fade " id="suredeletephoto" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              
                <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
            </div>
            <div class="modal-body">
    <form>
      <h1 class="modal-title fs-5" >are you sure from delete this photo</h1>

      
     


      

      <div class="btn-contianer d-flex  justify-content-between  align-items-center my-3">
            
        <button class="btn  btn-modal modal-color-text border-0">move back</button>
        <button class="btn  btn-modal btn-model-primary" type="button"   >delete</button>
       
</div>





</form>

          </div>
      
      </div>
  </div>

      </div>


@endsection

@section("js")

<script>


</script>

@endsection