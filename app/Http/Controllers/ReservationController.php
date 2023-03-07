<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Requests;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index($freelancer_id)
    {
        $freelancer = User::find($freelancer_id);
        return view('user.requestreservation', compact('freelancer'));
    }


    public function store(Request $request, $freelancer_id)
    {
        $this->validate($request, [
            'occasion' => 'required',
            'date_time' => 'required',
            'from' => 'required',
            'to' => 'required',
            'location' => 'nullable',
        ]);

        $data = $request->only('occasion', 'date_time', 'from', 'to', 'location');
        $data['user_id'] = Auth::User()->id;
        $data['freelancer_id'] = $request->freelancer_id;
        Reservation::create($data);
        return back();
    }



    public function show(Request $request)
    {
        $user_id = auth()->user()->id;
        $reservations = Reservation::where('user_id', $user_id)->get();
        return view('user.showreservation', compact('reservations'));
    }



    public function freelancerReservations(Request $request)
    {
        $freelancer_id = auth()->user()->id;
        $reservations = Reservation::where('freelancer_id', $freelancer_id)->get();
        return view("freelancer.showreservation", compact('reservations'));
    }


    
    public function changeStatus(Request $request , $id)
    {
        $reservation = Reservation::find($id);
        Reservation::where('id' , $id)->update(['status' => $request->status]);
        return back();
    }
}
