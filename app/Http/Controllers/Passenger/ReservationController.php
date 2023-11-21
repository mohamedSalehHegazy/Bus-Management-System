<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passenger\CreateReservationRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{

    /**
     * Reserve a Seat Or More in Specific trip
     * @param CreateReservationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateReservationRequest $request)
    {
        try {
            foreach($request->seats as $seatId){
                Reservation::create([
                    'trip_id' => $request->trip_id,
                    'user_id' => auth('api')->user()->id,
                    'seat_id' => $seatId
                ]);
            }

            return apiResponse(
                true,
                'Creation Success',
                200,
            );
          
        } catch (\Throwable $th) {
            Log::error($th);
            return apiResponse(
                false,
                'Some Thing Went Wrong !',
                500
            );
        }
    }
}
