<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'plate_number',
        'capacity',
        'active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class)->select('id','serial_no','bus_id');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
