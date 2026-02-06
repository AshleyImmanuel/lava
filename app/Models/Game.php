<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = [
        'name',
        'type',
        'image_url',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
}
