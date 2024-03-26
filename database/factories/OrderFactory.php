<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 20, 500), // Génère un prix aléatoire avec 2 décimales, entre 20 et 500.
            'user_id' => User::factory(), // Génère un ID d'utilisateur en utilisant UserFactory.
        ];
    }
}
