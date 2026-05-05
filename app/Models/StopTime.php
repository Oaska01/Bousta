<?php

namespace App\Models;

// use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StopTime extends Model
{
    protected $fillable =
    [
        'trip_id',
        'stop_id',
        'actual_arrival'
    ];

    protected $casts = [
        'actual_arrival' => 'datetime',
    ];

    public function stop() : BelongsTo
    {
        return $this -> belongsTo(Stop::class);
    }

    public function trip() : BelongsTo
    {
        return $this -> belongsTo(Trip::class);
    }
}
