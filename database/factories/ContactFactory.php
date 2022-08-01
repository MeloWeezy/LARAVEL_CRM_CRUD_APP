<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'city' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'country' => 'ZA',
            'region' => fake()->randomElement(['KZN', 'GP', 'NW', 'FS', 'MP', 'LM', 'WC', 'EC']),
            'address' => fake()->streetAddress(),
            'postal_code' => fake()->randomNumber(4),
            'organization_id' =>fake()->numberBetween(1,10)
        ];
    }
}
