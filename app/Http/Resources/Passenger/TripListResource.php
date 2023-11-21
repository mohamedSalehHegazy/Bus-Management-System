<?php

namespace App\Http\Resources\Passenger;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'departure_at'  => (string)date('Y-m-d h:i A', strtotime($this->departure_at)),
            'arrive_at' =>(string)date('Y-m-d h:i A', strtotime($this->arrive_at)),
            'available_seats'=> $this->available_seats,
            'bus'=> $this->bus,
            'departure_city'=> $this->departureCity,
            'arrival_city'=> $this->arrivalCity,
        ];
    }
}
