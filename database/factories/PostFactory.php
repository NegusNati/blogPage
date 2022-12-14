<?php

namespace Database\Factories;

use App\Models\Catagory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'catagory_id' => Catagory::factory(),
            'slug' => $this->faker->slug,
            'title' => $this->faker->title,
            'excerpt' => '<p>'. implode('</p><p>' , $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>'. implode('</p><p>' , $this->faker->paragraphs(6)) . '</p>',

        ];
    }
}
