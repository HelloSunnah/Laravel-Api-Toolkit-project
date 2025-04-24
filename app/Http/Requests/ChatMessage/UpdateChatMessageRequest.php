<?php

namespace App\Http\Requests\ChatMessage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sender_id' => ['sometimes', 'integer'],
			'receiver_id' => ['sometimes', 'integer'],
			'content' => ['sometimes', 'string'],
			'attachment' => ['sometimes', 'string'],
        ];
    }
}
