<?php

namespace App\Http\Requests\Passenger;

use App\Http\Requests\BaseValidationRequest;

class CreateReservationRequest extends BaseValidationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'trip_id' => [
                'integer',
                'exists:trips,id'
            ],
            'seats.*' => [
                'integer',
                'exists:seats,id',
                'unique:reservations,seat_id,NULL,id,trip_id,' . $this->trip_id
            ]
        ];
    }
}
