<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverAvailability extends Model
{

    protected $table = 'driver_availability';

    protected $fillable =
    [
        'driver_id',
        'date',
        'is_available',
        'reason'
    ];

    protected $casts = [
        'date' => 'date',
        'is_available' => 'boolean',
    ];

    public function driver() : BelongsTo
    {
        return $this -> belongsTo(User::class, 'driver_id');
    }
}
