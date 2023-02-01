<?php

namespace Database\Factories;

use App\Models\CarType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        return [
            'plate_number' => fake()->regexify('[A-Z]{' . mt_rand(6, 6) . '}'),
            'type_id' => function() {
                return CarType::factory()->create()->id;
            },
            'user_id' => function() {
                return CarType::factory()->create()->id;
            },
        ];
    }
}
