<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() : void
    {
        foreach (['Tag1', 'Tag2', 'Tag3', 'Tag4', 'Tag5', 'Tag6'] as $name) {
            Tag::factory()->create([
                'name' => $name,
            ]);
        }
    }
}
