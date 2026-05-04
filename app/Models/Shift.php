<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shift extends Model
{
    protected $fillable =
    [
        'route_id',
        'driver_id',
        'bus_id',
        'start_point',
        'date',
        'status'
    ];

    public function bus() : BelongsTo
    {
        return $this -> belongsTo(Bus::class);
    }

    public function route() : BelongsTo
    {
        return $this -> belongsTo(Route::class);
    }

    public function driver() : BelongsTo
    {
        return $this -> belongsTo(User::class);
    }
    public function trips() : HasMany
    {
        return $this -> hasMany(Trip::class)->orderBy('sequence', 'asc');
    }
}
