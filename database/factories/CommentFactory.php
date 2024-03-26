<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->text, // Génère un texte aléatoire pour la description.
            'image' => $this->faker->optional()->imageUrl(), // Génère une URL d'image aléatoire, optionnellement.
            'product_id' => \App\Models\Product::factory(), // Génère un ID de produit en utilisant ProductFactory.
            'user_id' => \App\Models\User::factory(), // Génère un ID d'utilisateur en utilisant UserFactory.
        ];
    }
}
