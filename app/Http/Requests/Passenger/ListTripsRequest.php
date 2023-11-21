<?php

namespace App\Http\Requests\Passenger;

use App\Http\Requests\BaseValidationRequest;

class ListTripsRequest extends BaseValidationRequest
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
            'date' => [
                'date',
                'date_format:Y-m-d',
                'after:yesterday'
            ],
            'departure_city_id' => [
                'integer',
                'exists:cities,id'
            ],
            'arrival_city_id' => [
                'integer',
                'exists:cities,id'
            ],
        ];
    }
}
