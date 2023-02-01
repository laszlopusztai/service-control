<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Car;
use App\Models\User;
use App\Models\CarType;
use App\Models\ServiceSheet;
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

        $tags = Tag::all();

        foreach (Car::all() as $car) {

            ServiceSheet::factory()
                ->count(2)
                ->for($car)
                ->create();

            [$tag1, $tag2] = $tags->random(2);

            $car->tags()->save($tag1);
            $car->tags()->save($tag2);
        }

        foreach (ServiceSheet::all() as $sheet) {

            [$tag1, $tag2, $tag3] = $tags->random(3);

            $sheet->tags()->save($tag1);
            $sheet->tags()->save($tag2);
            $sheet->tags()->save($tag3);
        }
    }
}
