<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    protected $fillable = [
        'title',
        'type',
        'game_id',
        'start_time',
        'max_players',
        'description',
        'status',
        'image_path',
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function matchResult(): HasOne
    {
        return $this->hasOne(MatchResult::class);
    }
}
