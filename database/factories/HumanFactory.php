<?php

namespace Database\Factories;

use App\Models\Human;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class HumanFactory extends Factory
{
    protected $model = Human::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'f_name' => fake()->lastName ,
            'o_name' => fake()->lastName,
            'gender' => array_rand(['man' => 'man', 'woman' => 'woman']),
            'data_birth' => fake()->date('d-m-Y'),
            'location_birth' => fake()->locale,
            'height' => rand(110, 280),
            'eye_color' => fake()->colorName,
            'hair_color' => fake()->colorName,
            'nationality' => array_rand(['Русский' => 'Русский', 'Лезгин' => 'Лезгин', 'Англичанин' => 'Англичанин']),
            'rod_id' => rand(1, 16),
            'generation' => rand(1, 16),
            'text' => fake()->text,
        ];
    }
}
