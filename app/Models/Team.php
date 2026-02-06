<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    protected $fillable = [
        'name',
        'game_id',
        'logo_url',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(TeamMember::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_members')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function wonMatches(): HasMany
    {
        return $this->hasMany(MatchResult::class, 'winner_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(TeamApplication::class);
    }
}
