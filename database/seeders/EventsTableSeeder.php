<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory(89)
            ->hasCategories(rand(1, 5))
            ->hasPhotos(rand(3, 15))
            ->create();
    }
}
