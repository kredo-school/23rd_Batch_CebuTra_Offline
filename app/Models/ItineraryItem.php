<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItineraryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'day',
        'sort_order',
        'time',
        'icon',
        'title',
        'place',
        'memo',
    ];

    protected $casts = [
        'day' => 'integer',
        'sort_order' => 'integer',
    ];

    /**
     * この予定が属している旅程
     */
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}
