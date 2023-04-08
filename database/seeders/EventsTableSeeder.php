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
        for ($i=0; $i<44; $i++ ) {
            Event::factory()
                ->hasCategories(random_int(1, 5))
                ->hasPhotos(random_int(1, 15))
                ->create();
        }
    }
}
