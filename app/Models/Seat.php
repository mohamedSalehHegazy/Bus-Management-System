<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'serial_no',
        'bus_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class,'bus_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
}
