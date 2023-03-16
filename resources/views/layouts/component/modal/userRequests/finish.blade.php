{{-- <div id="finish" class="modal offers fade" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="div d-flex justify-content-start px-4">
                    <div class="d-flex flex-column">
                        <h3 class="mb-0 font-bold">#324234</h3>
                        <span class="inprogress">finish</span>
                    </div>

                    <div class="align-slef-end" style="flex-grow: 1; display: flex; align-items: center; justify-content: end;">
                        <a  href="#" data-bs-toggle="offcanvas" data-bs-target="#chat" aria-controls="offcanvasRight">
                            <i class="uil-comments-alt"  style="font-size:20px;"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex flex-column px-5">
                    <div class="d-flex justify-content-between">
                        <p class=" mb-0" >category</p>
                        <p class="fw-900 mb-0">category</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">service</p>
                        <p class="fw-900 mb-0">service</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0" >title</p>
                        <p class="fw-900 mb-0">title</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">due date</p>
                        <p class="fw-900 mb-0 ">0000/00/00</p>
                    </div>
                </div>

                <div class="d-flex flex-column px-3 bg-blue ">
                    <span class="flex-grow-1 fs-5 font-bold ">description</span>
                    <p class="flex-grow-1 ">Lorem ipsum dolor sit amet consectetur .</p>
                </div>

                <div class="d-flex flex-column px-3 ">
                <p class="fs-5 font-bold">attachment</p>
                <div class="d-flex flex-column px-2 ">
                        <div class="file d-flex mb-2">
                            <div class="details d-flex ">
                                <div class="img">
                                    <i class="fa-regular fa-file-word"></i>
                                </div>

                                <div class="info">
                                    <p class=" mb-0">Lorem ipsum dolor sit amet, consetetur</p>
                                    <div class="size">521kB .word</div>
                                </div>
                            </div>
                        </div>

                        <div class="file d-flex mb-2">
                            <div class="details d-flex ">
                                <div class="img">
                                    <i class="fa-regular fa-file-word"></i>
                                </div>

                                <div class="info">
                                    <p class=" mb-0">Lorem ipsum dolor sit amet, consetetur</p>
                                    <div class="size">521kB . word</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-contianer d-flex flex-column justify-between align-items-center my-3">
                    <button class="btn  btn-modal btn-model-primary" type="button" data-bs-toggle="modal" data-bs-target="#review"  >complete</button>
                </div>
            </div>
        </div>
    </div>

<div style="position:fixed ; bottom:0;right:0; font-size:30px">
    <button class="addrequesticon" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat" aria-controls="offcanvasRight"><i class="uil-comments-alt"></i></button>
</div>
</div>



 --}}
 <div id="finish{{$request->id}}" class="modal offers fade"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="div d-flex justify-content-start px-4">
                    <div class="d-flex flex-column">
                        <h3 class="mb-0 font-bold">{{$request->random_id}}</h3>
                        <span class="inprogress">{{ $request->status }}</span>
                    </div>

                    <div class="align-slef-end" style="flex-grow: 1; display: flex; align-items: center; justify-content: end;">
                        <a  href="#" data-bs-toggle="offcanvas" data-bs-target="#chat" aria-controls="offcanvasRight">
                            <i class="uil-comments-alt"  style="font-size:20px;"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex flex-column px-5">
                    <div class="d-flex justify-content-between">
                        <p class=" mb-0" >category</p>
                        <p class="fw-900 mb-0">{{ App\Models\Category::where('id', $request->category_id)->first()->title_en }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">service</p>
                        <p class="fw-900 mb-0">{{ App\Models\Service::where('id', $request->service_id)->first()->service_en }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0" >title</p>
                        <p class="fw-900 mb-0">{{ $request->title }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">due date</p>
                        <p class="fw-900 mb-0 ">{{ $request->due_date }}</p>
                    </div>
                </div>

                <div class="d-flex flex-column px-3 bg-blue ">
                    <span class="flex-grow-1 fs-5 font-bold ">description</span>
                    <p class="flex-grow-1 ">{{ $request->description }}</p>
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
                
                <div class="btn-contianer d-flex flex-column justify-between align-items-center my-3">
                    <form action="{{route('user.completerequest',$request->id)}}" method="GET">

                        <button class=" btn-accept border-0 btn-modal rounded-pill mx-2"type="submit" >complete</button>
                      
                      </form>
                </div>
            </div>
        </div>
    </div>
   
    <div style="position:fixed ; bottom:0;right:0; font-size:30px">
        <button class="addrequesticon" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat{{$request->id}}" aria-controls="offcanvasRight"><i class="uil-comments-alt"></i></button>
    </div>
</div> <!-- end finish modal -->
