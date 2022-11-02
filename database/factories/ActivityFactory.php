<?php

namespace Database\Factories;

use App\Models\{Member,User,Listt,Activity,Board,Card,Comment};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->text,
            'message' => fake()->text,
        ];
    }
}
