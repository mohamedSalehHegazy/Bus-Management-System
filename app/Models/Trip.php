<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'departure_at',
        'arrive_at',
        'available_seats',
        'bus_id',
        'departure_city_id',
        'arrival_city_id',
        'active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class,'bus_id')->select('id','plate_number');
    }

    public function departureCity()
    {
        return $this->belongsTo(City::class,'departure_city_id')->select('id','name');
    }

    public function arrivalCity()
    {
        return $this->belongsTo(City::class,'arrival_city_id')->select('id','name');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
