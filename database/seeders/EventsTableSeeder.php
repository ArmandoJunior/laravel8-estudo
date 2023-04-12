<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
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
        for ($i=0; $i<20; $i++) {
            User::factory()
                ->hasProfile()
                ->create();
        }
        $categories = Category::query()->findMany([rand(1, 12),rand(1, 12),rand(1, 12),rand(1, 12)]);
        for ($i=0; $i<200; $i++ ) {
            Event::factory()
                ->hasAttached($categories)
                ->hasPhotos(random_int(1, 6))
                ->create();
        }
    }
}
