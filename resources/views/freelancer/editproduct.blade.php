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
  }
  .requestservice .container .form form button[type="submit"] {
    position: relative;
    left: 0;
    width:200px;
}

.requestservice .container .form form button[type="submit"] +button{
    width:200px;  
}
</style>
@endsection

@section("nosearch","none !important")
@section("content")
    

<div class="requestservice">
<div class="container">

<div class="form px-3">
    <div class="section-header">
            <h2>edit product</h2>
        </div>
    <form action="" method="">
     
     <div class="mb-4 hlafwidth">
       <label for="category"> category</label>
        <select name="category" id="category"class="form-select" aria-label="Default select example">
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
        </select>
       </div>
        <div class="mb-4 hlafwidth">
       <label for="v" class="pb-2">service</label>
        <select name="service" id="service"class="form-select" aria-label="Default select example">
            <option value="logo"></option>
            <option value=""></option>
            <option value=""></option>
        </select>
       </div>
       <div class="mb-4 hlafwidth">
  <label for="prodname" class="form-label pd-2">product name</label>
  <input type="text" class="form-control" id="prodname"  name="productname"placeholder="e.g wedding card">
</div>
       <div class="mb-4 hlafwidth">
  <label for="price" class="form-label pd-2">price</label>
  <input type="text" class="form-control" id="price" name="price" placeholder="50 S.R">
</div>
<div class="mb-4 fullwidth">
    <label for="description" class="form-label mb-3">description</label>
    <input  class="form-control " id="description" placeholder="Write product description"  name="discription">
  </div> 
<div class="mb-4 hlafwidth">
    <label for="proprety" class="form-label mb-3 " id>properties</label>
    <div id="properties">
        <input  class="form-control " id="proprety" placeholder="Write product proprets"  name="property">
        
    </div>


    
  </div> 
       
<div class="mb-4  fullwidth">

  <h5  class="form-label pd-2">attachment</h5>
  <div class="d-flex flex-column flex-nowrap ">
    <span class="py-4">Maximun upload 200 kB</span>
{{-- <div class="d-flex">
    <label for="attachment" class="download"> 
<i class="fa-solid fa-arrow-down"></i></label>
  <input type="file" class="form-control" id="attachment" name="attachment" placeholder="persentation title">
</div> --}}
<div id="newfile" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
  <div class="accordion-body d-flex flex-column">
    <div class="file d-flex ">
        <div class="details d-flex ">
            <div class="img">
<i class="fa-regular fa-file-word"></i>
            </div>
            <div class="info">
                <h3>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod temporlorem
                    
                </h3>
                <div class="size">
                    521kB . PDF
                </div>
            </div>
         
        </div>
        <div class="tool">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </div>
    </div>
  
  </div>
</div>
  </div>
  
</div>
<div class="mb-4 halfwidth">

  <h5  class="form-label pd-2">product pictures</h5>
  <div class="d-flex flex-column flex-nowrap ">
    <span class="py-4">Maximun 3 pictures</span>

    <div class="d-flex hlafwidth ">
        <div class="d-flex">
            <label for="attachment" class="download"> 
                <i class="fa-regular fa-image"></i></label>
          <input type="file" class="form-control" id="attachment" name="attachment" placeholder="persentation title">
        </div>
        <div class="d-flex">
            <label for="attachment" class="download"> 
                <i class="fa-regular fa-image"></i></label>
          <input type="file" class="form-control" id="attachment" name="attachment" placeholder="persentation title">
        </div>
        <div class="d-flex">
            <label for="attachment" class="download"> 
                <i class="fa-regular fa-image"></i></label>
          <input type="file" class="form-control" id="attachment" name="attachment" placeholder="persentation title">
        </div>
    </div>

  
  </div>
  
</div>


    
<div class="d-flex justify-content-center align-items-center flex-column ">

  <button type="submit" class="btn  btn-modal  my-3 px-5  btn-model-primary position-none ">edit product</button>

  <button type="button" class="btn  modal-color-text  d-block my-3 px-5 ">delete product</button>


</div>
     
    </form>

</div>

</div>

</div>


@endsection

@section("js")

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