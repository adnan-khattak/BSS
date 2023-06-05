<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'ic' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('123456789'),
        ];
    }
}
