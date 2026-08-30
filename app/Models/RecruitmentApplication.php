<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentApplication extends Model
{
    protected $fillable = [
        'user_id',
        'recruitment_post_id',
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

    public function recruitmentPost()
    {
        return $this->belongsTo(RecruitmentPost::class);
    }
}
