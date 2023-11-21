<?php

namespace App\Listeners\Passenger;

use App\Models\Reservation;
use App\Models\Trip;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTripAvailableSeatsWhenReservationCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Reservation $reservation): void
    {
        $trip = Trip::find($reservation->trip_id);
        $trip->available_seats -= 1;
        $trip->save();
    }
}
