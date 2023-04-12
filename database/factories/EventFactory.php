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
        $title = $this->faker->jobTitle . $this->faker->country;
        return [
            'title' => $title,
            'description' => $this->faker->words(15, true), // short information
            'body' => $this->faker->paragraph(50), // long information
            'start_event' => now(),
            'slug' => Str::slug($title),
            'owner_id' => rand(1,20),
        ];
    }
}
