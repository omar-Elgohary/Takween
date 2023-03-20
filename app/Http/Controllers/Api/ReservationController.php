<?php
namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiResponseTrait;

class ReservationController extends Controller
{
    use ApiResponseTrait;

    public function allReservations(Request $request)
    {   // new
        try{
            $reservations = Reservation::all();
                return $this->returnData(200, 'Reservations Returned Successfully', $reservations);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Reservations Returned Failed');
        }
    }


    public function createBookingPhotoShot(Request $request, $freelancer_id)
    {
        try{
            $request->validate([
                'occasion' => 'required',
                'date_time' => 'required',
                'from' => 'required',
                'to' => 'required',
                'location' => 'nullable',
            ]);

            $freelancer = User::find($freelancer_id);
                if($freelancer['is_photographer'] == 1){
                    $reservation = Reservation::create([
                        'user_id' => auth()->user()->id,
                        'freelancer_id' => $request->freelancer_id,
                        'occasion' => 'required',
                        'date_time' => 'required',
                        'from' => 'required|time',
                        'to' => 'required|time',
                        'location' => 'nullable',
                    ]);
                    return $this->returnData(201, 'Reservation Created Successfully', $reservation);
                }else{
                    return $this->returnError(500, "Freelancer Doesn't a Photographer");
                }
        }catch(\Exception $e){
            return $this->returnError(400, 'Reservation Created Failed');
        }
    }



    public function getReservationById(Request $request, $id)
    {
        try{
            $reservation = Reservation::find($id);
            if(!$reservation){
                return $this->returnError('404', 'Reservation Not Found');
            }
            return $this->returnData(200, 'Reservation Returned Successfully', $reservation);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Reservation Returned Failed');
        }
    }
}
