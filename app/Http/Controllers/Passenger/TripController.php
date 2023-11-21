<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passenger\ListTripsRequest;
use App\Http\Resources\Passenger\TripListResource;
use App\Http\Resources\Passenger\TripShowResource;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TripController extends Controller
{
    /**
     * List All Available Trips
     * @param ListTripsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function index(ListTripsRequest $request)
    {
        try {

            $query = Trip::select('id', 'departure_at', 'arrive_at', 'available_seats', 'bus_id', 'departure_city_id', 'arrival_city_id')
                ->whereActive(true)
                ->where('available_seats', '>', 0)
                ->whereDate('departure_at', '>=', now())
                ->orderBy('departure_at', 'ASC');

            if (($request->has('date')) && ($request->date != null)) {
                $query = $query->whereDate('departure_at', $request->date);
            }

            if (($request->has('departure_city_id')) && ($request->departure_city_id != null)) {
                $query = $query->where('departure_city_id', $request->departure_city_id);
            }

            if (($request->has('arrival_city_id')) && ($request->arrival_city_id != null)) {
                $query = $query->where('arrival_city_id', $request->arrival_city_id);
            }

            $records = $query->get();

            return apiResponse(
                true,
                '',
                200,
                TripListResource::collection($records)
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


    /**
     * Show Single Trip
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $record = Trip::select('id', 'departure_at', 'arrive_at', 'available_seats', 'bus_id', 'departure_city_id', 'arrival_city_id')
                ->whereId($id)
                ->whereActive(true)
                ->with('bus.seats', function ($q) use ($id) {
                    $q->whereDoesntHave('reservations', function ($query) use ($id) {
                        $query->where('trip_id', $id);
                    });
                })
                ->first();

            if (!$record) {
                return apiResponse(
                    true,
                    'Not Found !',
                    400,
                );
            }

            return apiResponse(
                true,
                '',
                200,
                new TripShowResource($record)
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
