<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' =>  $this->faker->randomNumber(),
			'roomName' => $this->faker->firstName(),
			'roomDesc' => $this->faker->text(),
			'totalSeat' => $this->faker->randomNumber(),
			'roomSerial' => $this->faker->randomNumber(),
			'status' => $this->faker->randomNumber(),
        ];
    }
}
