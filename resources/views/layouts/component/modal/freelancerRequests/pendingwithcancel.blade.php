<div class="modal offers fade" id="feelancerrequstPendingcancancel{{$request->id}}" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
          <div class="div d-flex justify-content-start px-4">
              <div class="d-flex flex-column">
                <h3 class="mb-0 font-bold">#324234</h3>
                <span class="text-black-50">pendding</span>
              </div>
              <div class="align-slef-end" style="
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: end;
">

<a  href="#" data-bs-toggle="offcanvas" data-bs-target="#chat" aria-controls="offcanvasRight">
    <i class="uil-comments-alt"  style="font-size:20px;"></i>
</a>


              </div>
          </div>
          <div class="d-flex flex-column px-5">
            <div class="d-flex justify-content-between">
                <p class=" mb-0" >{{__('request.customer name')}}</p>
                <p class="fw-900 mb-0">
               {{APP\Models\User::find($request->user_id)->name}}
            </div>
            <div class="d-flex justify-content-between">
                <p class=" mb-0" >{{__('request.category')}}</p>
                <p class="fw-900 mb-0">
               @if (App::getLocale() =="ar")
               {{App\Models\Category::where('id', $request->category_id)->first()->title_ar }}</p>
               @else
               {{App\Models\Category::where('id', $request->category_id)->first()->title_en }}</p>
               @endif
            </div>

            <div class="d-flex justify-content-between">
                <p class=" mb-0">{{__('request.service')}}</p>
                <p class="fw-900 mb-0">
                  @if (App::getLocale() =="ar")
                  {{ App\Models\Service::where('id', $request->service_id)->first()->service_ar }}</p>
                  @else
                  {{ App\Models\Service::where('id', $request->service_id)->first()->service_en }}</p>
                  @endif
  
            </div>

            <div class="d-flex justify-content-between">
                <p class=" mb-0" >{{__('request.title')}}</p>
                <p class="fw-900 mb-0">{{ $request->title }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p class=" mb-0">{{__('request.due date')}}</p>
                <p class="fw-900 mb-0 ">{{ $request->due_date }}</p>
            </div>
        </div>

          
          <div class="d-flex flex-column px-3 bg-blue ">
            <span class="flex-grow-1 fs-5 font-bold ">description</span>
            <p class="flex-grow-1">{{ $request->description }}</p>
        </div>

          </div>
         
          <div class="d-flex flex-column px-3 ">
            <p class="fs-5 font-bold">attachment</p>
<div class="d-flex flex-column px-2  gap-1">
      <div class="file d-flex mb-2  flex-grow-1  ">
            <div class="details d-flex ">
                <div class="img">
<i class="fa-regular fa-file-word"></i>
                </div>
                <div class="info">
                    <p class=" mb-0">
                        Lorem ipsum 
                        
                    </p>
                    <div class="size">
                        521kB .word
                    </div>
                </div>
             
            </div>
          
        </div>
      <div class="file d-flex mb-2 flex-grow-1 ">
            <div class="details d-flex  ">
                <div class="img">
<i class="fa-regular fa-file-word"></i>
                </div>
                <div class="info">
                    <p class=" mb-0">
                        Lorem ipsum dolor  
                     
                    </p>
                    <div class="size">
                        521kB . word
                    </div>
                </div>
             
            </div>
           
        </div>

</div>
<div class="px-2">
    <h5 class="text-black border-top mt-2 pt-2 ">Total price</h5>
<div class="d-flex justify-content-between">
    <p class=" mb-0">price</p>

    @if($request->offer->where('freelancer_id',auth()->user()->id)->first()!=null)
    <p class="fw-900 mb-0 text-black">{{$request->offer->where('freelancer_id',auth()->user()->id)->first()->price}} <span class="text-black-50 mx-1 fs-7">SR</span></p>
    @endif
</div>
</div>


@if($request->offer->where('freelancer_id',auth()->user()->id)->first()!=null)
         
          <div class="btn-contianer d-flex flex-column justify-content-center align-items-center my-3">
          
            <button class="btn-cormoz btn-modal border-0"type="button" data-bs-toggle="modal" data-bs-target="#suredelete" >Cancel</button>
           
           
             </div>

             @endif
        </div>
       
      </div>
      
    </div>
    @if($request->type=='private')
    <div  style="position:fixed ; bottom:0;right:0; font-size:30px">
       
            <button class="addrequesticon" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat{{$request->id}}" aria-controls="offcanvasRight"><i class="uil-comments-alt"></i></button>
            
                
    </div>
    @endif
    
  </div>




 