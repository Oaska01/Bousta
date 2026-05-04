<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    protected $fillable =
    [
        'shift_id',
        'route_id',
        'trip_template_id',
        'departure_time',
        'sequence',
        'status',

    ];

    protected $casts = [
        'departure_time' => 'datetime:H:i',
    ];

    public function tripTemplate() : BelongsTo
    {
        return $this -> belongsTo(TripTemplate::class);
    }

    public function route() : BelongsTo
    {
        return $this -> belongsTo(Route::class);
    }

    public function shift() : BelongsTo
    {
        return $this -> belongsTo(Shift::class);
    }

    public function stopTimes() : HasMany
    {
        return $this -> hasMany(StopTime::class);
    }

    public function lostItemReports() : HasMany
    {
        return $this -> hasMany(LostItemReport::class);
    }

    public function lostItems() : HasMany
    {
        return $this -> hasMany(LostItem::class);
    }

}
