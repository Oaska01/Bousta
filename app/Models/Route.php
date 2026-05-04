<?php

namespace App\Models;

use App\Models\Stop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Route extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'start_stop_id',
        'end_stop_id',
        'return_route_id',

        'name',
        'description',
        'status',
    ];

    public function startStop() :BelongsTo
    {
        // A route belongs to ONE specific start stop
        return $this -> belongsTo(Stop::class, 'start_stop_id');
    }

    public function endStop() :BelongsTo
    {
        // A route belongs to ONE specific end stop
        return $this -> belongsTo(Stop::class, 'end_stop_id');
    }

    public function returnRoute(): BelongsTo
    {
        return $this->belongsTo(Route::class, 'return_route_id');
    }


    public function stops(): BelongsToMany
    {
        return $this->belongsToMany(Stop::class, 'route_stops')
                    // When you fetch the stops, also reach into that middle table and grab the 'order'
                    // and 'offset_minutes' values for each stop
                    ->withPivot('order', 'offset_minutes')
                    // This ensures that whenever a stop is added to a route, Laravel automatically fills
                    // in the created_at and updated_at columns in the route_stops table.
                    ->withTimestamps()
                    // every time you call $route->stops, Laravel will automatically sort them
                    // from the first station to the last station for you.
                    ->orderByPivot('order', 'asc');

    }

    public function tripTemplates() : HasMany
    {
        return $this -> hasMany(TripTemplate::class);
    }

    public function RouteStops() : HasMany
    {
        return $this -> hasMany(RouteStop::class);
    }

    public function shifts() : HasMany
    {
        return $this -> hasMany(Shift::class);
    }
    //  It is a conscious denormalization for query performance 
    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}
