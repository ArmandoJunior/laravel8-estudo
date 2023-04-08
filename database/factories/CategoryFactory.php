<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryName = $this->faker->city;
        return [
            'name' => $categoryName,
            'description' => $this->faker->sentence,
            'slug' => Str::slug($categoryName)
        ];
    }
}
