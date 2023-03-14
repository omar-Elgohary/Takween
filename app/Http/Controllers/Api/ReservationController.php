<?php
namespace App\Http\Controllers\Api;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;

class ReservationController extends Controller
{
    use ApiResponseTrait;

    public function allReservations(Request $request)
    {
        try{
            $reservations = Reservation::all();
                return $this->returnData(200, 'Reservations Returned Successfully', $reservations);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Reservations Returned Failed');
        }
    }
}
