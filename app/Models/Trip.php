<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'days',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    /**
     * この旅程を作成したユーザー
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * この旅程に含まれる予定
     */
    public function itineraryItems(): HasMany
    {
        return $this->hasMany(ItineraryItem::class);
    }

    /**
     * この旅程に紐づいているイベント
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
