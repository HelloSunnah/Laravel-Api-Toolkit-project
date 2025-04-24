<?php

namespace App\Http\Requests\ChatMessage;

use Illuminate\Foundation\Http\FormRequest;

class CreateChatMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sender_id' => ['required', 'integer'],
			'receiver_id' => ['required', 'integer'],
			'content' => ['string'],
			'attachment' => ['string'],
        ];
    }
}
