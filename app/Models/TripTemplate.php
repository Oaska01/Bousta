<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TripTemplate extends Model
{
    protected $fillable =
    [
        'route_id',
        'departure_time',
        'day_of_week'
    ];

    /**
     * Cast attributes to specific types for easier manipulation.
     */
    protected $casts = [
        // 'departure_time' => 'datetime:H:i', // Treat as time
    ];

    public function route() : BelongsTo
    {
        return $this -> belongsTo(Route::class);
    }

    public function trips() : HasMany
    {
        return $this -> hasMany(Trip::class);
    }

    /*
     * Scope: Easily filter templates by day of the week.
     * Usage: TripTemplate::forDay('Sunday')->get();
    */
    public function scopeForDay(Builder $query, string $day): Builder
    {
        return $query->where('day_of_week', $day);
    }
}
