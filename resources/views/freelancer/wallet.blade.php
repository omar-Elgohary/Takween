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
  }
</style>
@endsection


@section("content")
  
<div class="files">
    <div class="container">
        <div class="waltinfo d-flex ">

            <div class="flex-grow-1 cash">
                 <div class="section-header ">
            <h2>wallet </h2>
        </div>
                <div class="hoverdiv d-flex justify-content-around align-items-baseline py-3" >
                    <div class="wall d-flex flex-column">
                        <p class="total">total</p>
                        <P class="number" style="font-size:49px">127<span>
                            SR
                        </span>
                            </P>
                    </div>
                    <button class="btn" data-bs-target="#cashout" data-bs-toggle="modal" type="button">cashout</button>
                </div>
            </div>
            <div class="flex-grow-1 hestory">
                 <div class="section-header ">
            <h2>wallet history </h2>
        </div>
        <div class="hest mx-2">
             
{{--  --}}

<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header d-flex align-items-center justify-content-between p-2" id="panelsStayOpen-headingOne">
        <div  class= "info d-flex flex-column">
        <p class="text-black-100 p-0 m-0">refund</p>
        <p class="text-black-50">2/8/2202</p>
        </div>
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#refund1" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        <div class="number">
            +
            <span >150</span>
            <span>RS</span>
        </div>
      </button>
    </h2>
    <div id="refund1" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong>  that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header d-flex align-items-center justify-content-between p-2" id="panelsStayOpen-headingOne">
        <div  class= "info d-flex flex-column">
        <p class="text-black-100 p-0 m-0">refund</p>
        <p class="text-black-50">2/8/2202</p>
        </div>
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#refund2" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        <div class="number">
            +
            <span>150</span>
            <span>RS</span>
        </div>
      </button>
    </h2>
    <div id="refund2" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong>  that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header d-flex align-items-center justify-content-between p-2" id="panelsStayOpen-headingOne">
        <div  class= "info d-flex flex-column">
        <p class="text-black-100 p-0 m-0">refund</p>
        <p class="text-black-50">2/8/2202</p>
        </div>
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#refund4" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        <div class="number">
            +
            <span>150</span>
            <span>RS</span>
        </div>
      </button>
    </h2>
    <div id="refund4" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong>  that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>


</div>


            {{--  --}}
        </div>
            </div>

        </div>
   
    </div>
</div>

@endsection

@section("js")
    
@endsection