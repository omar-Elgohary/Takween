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

@endsection

@section("nosearch","none !important")
@section("content")
    

<div class="requestservice   private">
<div class="container">
  <div class="section-header ">
    <h2>request service from <span class="px-3">freelancer name</span> </h2>
    
</div>
<div class="form px-3">
   
    <form action="" method="">
     
     <div class="mb-4">
       <label for="category"> category</label>
        <select name="category" id="category"class="form-select" aria-label="Default select example">
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
        </select>
       </div>
        <div class="mb-4">
       <label for="v" class="pb-2">service</label>
        <select name="service" id="service"class="form-select" aria-label="Default select example">
            <option value="logo"></option>
            <option value=""></option>
            <option value=""></option>
        </select>
       </div>
       <div class="mb-4">
  <label for="title" class="form-label pd-2">title</label>
  <input type="text" class="form-control" id="title" placeholder="persentation title">
</div>
       
<div class="mb-4">

  <h5  class="form-label pd-2">attachment</h5>
  <div class="d-flex flex-column flex-nowrap ">
    <span class="py-4">Maximun upload 200 kB</span>
<div class="d-flex">
    <label for="attachment" class="download"> 
<i class="fa-solid fa-arrow-down"></i></label>
  <input type="file" class="form-control" id="attachment" name="attachment" placeholder="persentation title">
</div>
  
  </div>
  
</div>
       

<div class="mb-4">
  <label for="description" class="form-label mb-3">description</label>
  <textarea class="form-control w-100" id="description" placeholder="descripe" rows="3" name="discription"></textarea>
</div>

<div class="mb-4">
  <label for="date" class="form-label mb-3">due date</label>
  <input type="date" class="form-control" id="date"  name="duedate">
</div>

    
<button type="submit" class="btn  btn-modal  my-3 px-5  btn-model-primary ">request</button>
     
    </form>

</div>

</div>

</div>


@endsection

@section("js")
    
@endsection