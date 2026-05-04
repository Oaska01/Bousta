<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class LostItemReport extends Model
{

    use SoftDeletes;

    protected $fillable =
    [
        'passenger_id',
        'trip_id',
        'category',
        'description',
        'image_url',
        'status'
    ];

    public function passenger() : BelongsTo
    {
        return $this -> belongsTo(User::class, 'passenger_id');
    }

    public function trip() : BelongsTo
    {
        return $this -> belongsTo(Trip::class);
    }

    public function matchedItem() : HasOne
    {
        return $this -> hasOne(LostItem::class, 'lost_item_report_id');
    }
}
