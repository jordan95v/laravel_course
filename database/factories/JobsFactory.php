<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobs>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = ["php", "laravel"];
        return [
            "title" => fake()->jobTitle(),
            "company" => fake()->company(),
            "company_email" => fake()->companyEmail(),
            "tags" => $tags[array_rand($tags)],
            "description" => fake()->paragraph(5)
        ];
    }
}