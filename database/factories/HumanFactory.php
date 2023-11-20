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
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'f_name' => fake()->lastName ,
            'gender' => array_rand(['man', 'woman']),
            'data_birth' => fake()->date,
            'location_birth' => fake()->locale,
            'height' => random_int(110, 280),
            'eye_color' => fake()->colorName,
            'hair_color' => fake()->colorName,
            'nationality' => array_rand(['Русский', 'Лезгин', 'Англичанин']),
            'rod_id' => random_int(1, 16),
            'generation' => random_int(1, 16),
        ];
    }
}
