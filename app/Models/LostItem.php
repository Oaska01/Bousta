<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class LostItem extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'reporter_id',
        'trip_id',
        'lost_item_report_id',
        'category',
        'description',
        'image_url',
        'status'
    ];

    public function reporter() : BelongsTo
    {
        return $this -> belongsTo(User::class, 'reporter_id');
    }

    public function trip() : BelongsTo
    {
        return $this -> belongsTo(Trip::class);
    }

    public function report() : HasOne
    {
        return $this -> hasOne(LostItemReport::class, 'lost_item_report_id');
    }
}
