<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingParticipant extends Model
{
    protected $guarded = [];

    public static function saveParticipants($meetingId, array $participants): void
    {
        foreach ($participants as $userId) {
            self::create([
                'meeting_id' => $meetingId,
                'user_id' => $userId,
            ]);
        }
    }
}
