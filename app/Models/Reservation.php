<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'trip_id',
        'seat_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class,'trip_id');
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class,'seat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
