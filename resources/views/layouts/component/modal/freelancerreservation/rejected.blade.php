<div id="rejected{{ $request->id }}" class="modal offers fade" aria-hidden="true"   aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
    
        <div class="modal-header ">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    
        <div class="modal-body">
            <div class="div d-flex justify-content-start px-4">
                <div class="d-flex flex-column">
                <h3 class="mb-0 font-bold">{{ $request->random_id }}</h3>
                <span class="status text-danger">rejected</span>
                </div>
    
                <div class="align-slef-end" style="flex-grow: 1; display: flex; align-items: center; justify-content: end;">
                    <a  href="#" data-bs-toggle="offcanvas" data-bs-target="#chat{{$request->id}}" aria-controls="offcanvasRight">
                        <i class="uil-comments-alt" style="font-size:20px;"></i>
                    </a>
                </div>
            </div>
    
            <div class="d-flex flex-column px-5">
            <div class="d-flex justify-content-between">
                <p class=" mb-0">Freelancer Name</p>
                <p class="fw-900 mb-0 text-black">{{ App\Models\User::where('id', $request->freelancer_id)->first()->name }}</p>
            </div>
    
            <div class="d-flex justify-content-between">
                <p class=" mb-0">Occasion</p>
                <p class="fw-900 mb-0 text-black">{{ $request->occasion }}</p>
            </div>
    
            <div class="d-flex justify-content-between">
                <p class=" mb-0">Due Date</p>
                <p class="fw-900 mb-0 text-black">{{date_format(new dateTime($request->date_time),'d/m/Y')}}</p>
            </div>
    
            <div class="d-flex justify-content-between">
                <p class=" mb-0">time</p>
                <div class="d-flex">
                <span class="text-black-50 mx-1">From</span>
                <p class="fw-900 mb-0 text-black">{{ \Carbon\Carbon::parse($request->from)->format('h:m A')}}</p>
                <span class="text-black-50 mx-1">To</span>
                <p class="fw-900 mb-0 text-black">{{ \Carbon\Carbon::parse($request->to)->format('h:m A')}}</p>
                </div>
            </div>
    
            <div class="d-flex justify-content-between">
                <p class=" mb-0">Location</p>
                <p class="fw-900 mb-0 text-black"><i class="fa fa-location"></i>{{ $request->location }}</p>
            </div>
        </div>
    
      
    
    </div>
    </div>
    </div>
    
        <div  style="position:fixed ; bottom:0;right:0; font-size:30px">
            <button class="addrequesticon" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat{{$request->id}}" aria-controls="offcanvasRight"><i class="uil-comments-alt"></i></button>
        </div>
    </div>
    
    