<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Human>
 */
class HumanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'surname' => fake()->lastName ,
            'lastname' => fake()->lastName,
            'date_birth' => fake()->date(),
            'location_birth' => fake()->locale,
            'nationality' => array_rand(['Русский' => 'Русский', 'Лезгин' => 'Лезгин', 'Англичанин' => 'Англичанин']),
            'rod_id' => 1,
            'global_search' => true,
        ];
    }
}
