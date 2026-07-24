<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favoriteTrips() {
        return $this->belongsToMany(Trip::class, 'favorites')->withTimestamps();
    }

    // すでにお気に入り登録しているか確認するメソッド
    public function hasFavorited(Trip $trip) {
        return $this->favoriteTrips()->where('trip_id', $trip->id)->exists();
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'nationality',
        'native_language',
        'school',
        'english_level',
        'residing_area',
        'stay_duration',
        'hobbies',
        'avatar_path',
    ];
}

    
