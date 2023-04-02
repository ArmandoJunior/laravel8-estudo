<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * php artisan make:factory PhotoFactory
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->imageUrl()
        ];
    }
}
