<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(7)
            ->has(
                Event::factory(30)
                    ->hasCategories(2)
                    ->hasPhotos(7)
            )
            ->hasProfile()
            ->create();
    }
}
