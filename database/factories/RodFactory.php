<?php

namespace Database\Factories;

use App\Models\Rod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RodFactory extends Factory
{
    protected $model = Rod::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'user_id' => User::factory(),
        ];
    }
}
