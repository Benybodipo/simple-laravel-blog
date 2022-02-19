<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 4),
            'content' => $this->faker->text($maxNbChars = 1000)  
        ];
    }
}
