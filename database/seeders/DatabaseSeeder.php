<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Car;
use App\Models\User;
use App\Models\CarType;
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

        foreach (['Subaru', 'Toyota', 'Audi'] as $type) {
            CarType::factory()->create([
                'type' => $type,
            ]);
        }

        $user1 = User::factory()->create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
        ]);

        $user2 = User::factory()->create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
        ]);

        foreach (CarType::all()->pluck('id')->toArray() as $typeId) {
            Car::factory()->create([
                'type_id' => $typeId,
                'user_id' => $user1->id,
            ]);

            Car::factory()->create([
                'type_id' => $typeId,
                'user_id' => $user2->id,
            ]);
        }
    }
}
