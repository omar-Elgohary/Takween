<div id="feelancerReservationPendingAceptOrReject{{ $reservation->id }}" class="modal offers fade" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="div d-flex justify-content-start px-4">
                    <div class="d-flex flex-column">
                        <h3 class="mb-0 font-bold">#324234</h3>
                        <span class="text-black-50">{{ $reservation->status }}</span>
                    </div>

                    <div class="align-slef-end" style="flex-grow: 1;display: flex;align-items: center;justify-content: end;">
                        <a  href="#" data-bs-toggle="offcanvas" data-bs-target="#chat" aria-controls="offcanvasRight">
                            <i class="uil-comments-alt" style="font-size:20px;"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex flex-column px-5">
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Customer Name</p>
                        <p class="fw-900 mb-0 text-black">{{ App\Models\User::where('id', $reservation->user_id)->first()->name }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">Occasion</p>
                        <p class="fw-900 mb-0 text-black">{{ $reservation->occasion }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">Due Date</p>
                        <p class="fw-900 mb-0 text-black">0000/00/00</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Time</p>
                        <div class="d-flex">
                            <span class="text-black-50 mx-1">From</span>
                            <p class="fw-900 mb-0 text-black">{{ $reservation->from }}</p>
                            <span class="text-black-50 mx-1">To</span>
                            <p class="fw-900 mb-0 text-black">{{ $reservation->to }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Location</p>
                        <p class="fw-900 mb-0 text-black"><i class="fa fa-location"></i>{{ $reservation->location }}</p>
                    </div>
                </div>

                <div class="btn-contianer d-flex flex-row justify-content-center align-items-center my-3">
                    <form action="{{ route('freelanc.reservations.status', $reservation->id) }}" method="post">
                        @csrf
                        <td><input type="submit" name="status" value="Accepted" class="btn btn-accept border-0 btn-modal rounded-pill mx-2" data-bs-toggle="modal" data-bs-target="#sendofferforreservation"></td>
                        <td><input type="submit" name="status" value="Rejected" class="btn btn-reject border-0 btn-modal rounded-pill mx-2" data-bs-toggle="modal" data-bs-target="#suredelete"></td>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div  style="position:fixed ; bottom:0;right:0; font-size:30px">
        <button class="addrequesticon" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat" aria-controls="offcanvasRight"><i class="uil-comments-alt"></i></button>
    </div>
</div>




