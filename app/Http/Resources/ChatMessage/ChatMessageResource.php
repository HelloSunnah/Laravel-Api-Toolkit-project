<?php

namespace App\Http\Resources\ChatMessage;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'sender_id' => $this->sender_id,
			'receiver_id' => $this->receiver_id,
			'content' => $this->content,
			'attachment' => $this->attachment,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
