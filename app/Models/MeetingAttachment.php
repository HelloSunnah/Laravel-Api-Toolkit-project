<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MeetingAttachment extends Model
{
    protected $guarded = [];

    public static function saveAttachments($meetingId, $files, $attachment_titles = null): void
    {
        foreach ($files as $key => $file) {
            $path = $file->store('meeting_attachments', 'public');

            self::create([
                'meeting_id' => $meetingId,
                'attachment_path' => Storage::url($path),
                'attachment_title' => is_array($attachment_titles) ? ($attachment_titles[$key] ?? null) : $attachment_titles,
                'attachment_type' => $file->getMimeType(),
            ]);
        }
    }
}
