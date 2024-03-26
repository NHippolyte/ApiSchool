<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // Génère un nom de produit composé de deux mots.
            'description' => $this->faker->paragraph, // Génère un paragraphe aléatoire pour la description.
            'price' => $this->faker->randomFloat(2, 5, 100), // Génère un nombre aléatoire pour le prix avec 2 chiffres après la virgule, entre 5 et 100.
            'categorie_id' => Categorie::factory(), // Génère un ID de catégorie en utilisant CategorieFactory.
        ];
    }
}
