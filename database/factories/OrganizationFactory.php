<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'city' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'country' => 'ZA',
            'region' => fake()->randomElement(['KZN', 'GP', 'NW', 'FS', 'MP', 'LM', 'WC', 'EC']),
            'address' => fake()->streetAddress(),
            'postal_code' => fake()->randomNumber(4),
        ];
    }
}
