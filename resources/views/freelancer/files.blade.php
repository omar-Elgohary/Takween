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
  .files{
    padding-top:30px;
    padding-bottom:30px;
    flex-direction: column;
  }
</style>
@endsection


@section("content")
  
<div class="files">
    <div class="container">

        <div class="files d-flex">
            <div class="section-header  p-2">
            <h2>Files </h2>
            </div>
 
            {{--  --}}
<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#newfile" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
     <span class="px-2">New</span>
       
      </button>
    </h2>
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
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#last-monthfile" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
      <span class="px-2"> Last month</span>
      </button>
    </h2>
    <div id="last-monthfile" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
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
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#oldfile" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
      <span class="px-2"> Older</span> 
      </button>
    </h2>
    <div id="oldfile" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
           {{-- write data file --}}
      </div>
    </div>
  </div>
</div>
            {{--  --}}
        </div>
    </div>
</div>

@endsection

@section("js")
    
@endsection