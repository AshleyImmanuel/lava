<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamApplication extends Model
{
    protected $fillable = [
        'user_id',
        'team_id',
        'status',
        'message',
        'ingame_id',
        'ingame_name',
        'phone_number',
        'personal_email',
        'ingame_level',
        'experience',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
