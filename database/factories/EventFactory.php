<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(5, true);
        return [
            'title' => $title,
            'description' => $this->faker->words(19, true),
            'body' => $this->faker->paragraph(50),
            'start_event' => now(),
            'slug' => Str::slug($title)
        ];
    }
}
