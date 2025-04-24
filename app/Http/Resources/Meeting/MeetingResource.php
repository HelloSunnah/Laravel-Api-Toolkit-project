<?php

namespace App\Http\Resources\Meeting;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'host' => $this->host,
            'date' => dateTimeFormat($this->date),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'timezone' => $this->timezone,
            'company_id' => $this->company_id,
            'client_id' => $this->client_id,
            'project_id' => $this->project_id,
            'location_id' => $this->location_id,
            'status' => $this->status,
            'meeting_status' => $this->meeting_status,
            'participants' => $this->participants->map(function ($participant) {
                return [
                    'id' => $participant->id,
                    'user_id' => $participant->user_id,
                    'remarks' => $participant->remarks,
                    'attendance_status'=>$participant->attendance_status
                ];
            }),
            'meeting_type' => $this->meeting_type,
            'attachments' => $this->attachments->map(function ($attachment) {
                return [
                    'id' => $attachment->id,
                    'attachment_title' => $attachment->attachment_title,
                    'attachment_path' => $attachment->attachment_path,
                    'attachment_type' => $attachment->attachment_type,
                ];
            }),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
