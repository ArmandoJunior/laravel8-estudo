<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * php artisan make:factory ProfileFactory
     *
     * @return array
     */
    public function definition()
    {
        $socialNetworks = ['facebook', 'google', 'linkdin', 'instagram', 'tik-tok', 'youtube', 'github'];
        $randValues = array_rand(array_flip($socialNetworks), rand(2, 4));
        $collectionUsers = User::all();
        $userNumbers = $collectionUsers->count();
        return [
//            'user_id' => rand(1, $userNumbers),
            'about' => $this->faker->sentence,
            'phone' => $this->faker->numerify('+55 (##) # ####-####'),
            'social_networks' => implode(',', $randValues)
        ];
    }
}
