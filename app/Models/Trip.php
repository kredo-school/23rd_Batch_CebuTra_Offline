<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['title', 'trip_date', 'max_participants', 'location'];

    /**
     * Get the count of approved participants.
     */
    public function approvedParticipantsCount()
    {
        // Mock a reasonable number of participants for demonstration
        return min(3, $this->max_participants);
    }
}
