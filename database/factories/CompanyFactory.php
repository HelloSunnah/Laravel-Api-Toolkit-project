<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'abbreviation' => $this->faker->firstName(),
			'description' => $this->faker->firstName(),
			'slogan' => $this->faker->firstName(),
			'details' => $this->faker->firstName(),
			'address' => $this->faker->firstName(),
			'website' => $this->faker->firstName(),
			'phone_1' => $this->faker->firstName(),
			'phone_2' => $this->faker->firstName(),
			'phone_3' => $this->faker->firstName(),
			'mobile' => $this->faker->firstName(),
			'email' => $this->faker->safeEmail(),
			'status' => $this->faker->randomNumber(),
        ];
    }
}
