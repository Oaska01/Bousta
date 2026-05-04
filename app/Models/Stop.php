<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stop extends Model
{
    protected $fillable =
    [
        'name',
        'lat',
        'lng'
    ];

    public function routes(): BelongsToMany
    {
        return $this -> belongsToMany(Route::class, 'route_stops');
    }

    public function startingRoutes() :HasMany
    {
        return $this -> hasMany(Route::class, 'start_stop_id');
    }
    public function endingRoutes() :HasMany
    {
        return $this -> hasMany(Route::class, 'end_stop_id');
    }

}
