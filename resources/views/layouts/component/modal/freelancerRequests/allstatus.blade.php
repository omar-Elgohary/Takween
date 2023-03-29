<div class="modal offers fade" id="freelancerallstatus{{$request->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header ">
            
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
          <div class="div d-flex justify-content-start px-4">
              <div class="d-flex flex-column">
                <h3 class="mb-0 font-bold">{{$request->random_id}}</h3>

                
                @if ( $request->status =='Cancel by customer')
                <span class="cancel  text-danger">cancel</span>
                @elseif($request->status =='Finished')
                <span class="finish ">{{$request->status}}</span>
                @elseif($request->status =='Completed')
                <span class="text-black text-warning">{{$request->status}}</span>
                @elseif($request->status =='Pending')
                <span class="text-black-50 text-warning">{{$request->status}}</span>
                @else
                
                @endif
                {{-- <span class="inprogress">{{$request->status}}</span> --}}
              </div>
              <div class="align-slef-end" style="
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: flex-end;
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
            <span class="flex-grow-1 fs-5 font-bold ">{{__('request.description')}}</span>
            <p class="flex-grow-1">{{ $request->description }}</p>
          </div>
  
          <div class="d-flex flex-column px-3">
            <p class="fs-5 font-bold">attachment</p>
            <div class="d-flex flex-column px-2 ">
                @foreach (  $request->file()->get() as $file)
                <div class="file d-flex mb-2">
                    <div class="details d-flex ">
                        <div class="img">
                            <i class="fa-regular fa-file-word"></i>
                        </div>

                        <div class="info">
                            <p class="mb-0">{{ $file->name }}</p>
                            <div class="size">{{ $file->size}}kB .{{ $file->type }}</div>
                        </div>
                    </div>
                </div> <!-- end offerPending modal -->
                @endforeach
            </div>
        </div>
          
        @if(empty($request->review->first()))
        <div class="btn-contianer d-flex flex-column justify-between align-items-center my-3">
            <button class="btn btn-modal btn-model-primary" type="button" data-bs-toggle="modal" data-bs-target="#review{{$request->id}}">Rate</button>
        </div>
        @else
        <div class="myreview flex-column py-3">
            <div class="d-flex">
                <h5 class="flex-grow-1 fw-900">your review</h5>
                
                <div class="d-flex flex-grow-1 justify-content-end align-items-center">

                    @for ( $i=$request->review->first()->rate ;$i>0; $i-- )
                   
                    <i class="fa fa-star active"></i>
                  
                    
                    @endfor
                    @for ($i=5-$request->review->first()->rate ;$i>0; $i-- )
                    <i class="fa fa-star"></i>
                        
                    @endfor
                   
                </div>
            </div>

            <p>
                {{$request->review->first()->pragraph}}
            </p>
        </div>

 @endif

       
        </div>
       
      </div>
      
    </div>
<div  style="position:fixed ; bottom:0;right:0; font-size:30px">
   
        <button class="addrequesticon" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat{{$request->id}}" aria-controls="offcanvasRight"><i class="uil-comments-alt"></i></button>
        
                
 
</div>
    
  </div>




 