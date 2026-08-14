<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'host_id',
        'trip_id',
        'title',
        'description',
        'image',
        'meeting_place',
        'start_date',
        'end_date',
        'capacity',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'capacity' => 'integer',
    ];

    /**
     * 主催者
     */
    public function host(): BelongsTo
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    /**
     * 添付された旅程
     */
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    /**
     * イベントに紐づくタグ
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'event_tags',
            'event_id',
            'tag_id'
        )->withTimestamps();
    }

    /**
     * イベント参加者
     */
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'event_participants',
            'event_id',
            'user_id'
        )->withTimestamps();
    }
}

