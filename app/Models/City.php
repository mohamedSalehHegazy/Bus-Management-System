<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
