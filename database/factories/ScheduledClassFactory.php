<?php

namespace Database\Factories;

use App\Models\ClassType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduledClass>
 */
class ScheduledClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructor_id' => User::factory(),
            'class_type_id' => ClassType::factory(),
            'date_time' => fake()->unique()->dateTimeBetween('now', '+1 month'),
        ];
    }
}