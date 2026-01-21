<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['full-time', 'part-time', 'contract', 'internship'];
        $experienceLevels = ['Entry Level', 'Mid Level', 'Senior Level', 'Lead/Manager'];

        return [
            'user_id' => User::factory()->employer(), // employer
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(45),
            'location' => fake()->city(),
            'job_type' => fake()->randomElement($types),
            'salary' => fake()->numberBetween(30000, 120000),
            'education' => fake()->randomElement([
                'High School',
                'Diploma',
                'Bachelor',
                'Master',
                'PhD',
            ]),
            'experience_level' => fake()->randomElement($experienceLevels),
        ];
    }
}
