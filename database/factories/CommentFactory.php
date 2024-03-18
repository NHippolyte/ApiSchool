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
            'post_id' => rand(1, Post::count()), // Assurez-vous que Post::count() n'est pas 0
            'content' => $this->faker->paragraph(),
            'user_id' => rand(1, User::count()), // Assurez-vous que User::count() n'est pas 0
            'image' => 'default_picture_' . rand(1,5) . '.jpg',
            'tags' => $this->faker->words(3, true),
        ];
    }
}
