<?php

namespace App\Models;

use App\Models\Shift;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'plate_number',
        'model',
        'capacity',
        'status'
    ];

    protected $casts = [
        'capacity' => 'integer',
        'status' => 'string',
        'lat' => 'double',
        'lng' => 'double',
    ];

    public function shifts() : HasMany
    {
        return $this -> hasMany(Shift::class);
    }
}
