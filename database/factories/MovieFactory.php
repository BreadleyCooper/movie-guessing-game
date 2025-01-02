<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(),
            "release_date" => $this->faker->dateTime(),
            "revenue" => $this->faker->numberBetween(1, 1000000),
            "genres" => implode(',', [$this->faker->word(), $this->faker->word()]),
            "vote_average" => $this->faker->numberBetween(1, 10),
            "budget" => $this->faker->numberBetween(1, 1000000),
        ];
    }
}
