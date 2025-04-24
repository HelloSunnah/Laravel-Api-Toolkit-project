<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChatMessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sender_id' => createOrRandomFactory(\App\Models\Sender::class),
			'receiver_id' => createOrRandomFactory(\App\Models\Receiver::class),
			'content' => $this->faker->firstName(),
			'attachment' => $this->faker->firstName(),
        ];
    }
}
