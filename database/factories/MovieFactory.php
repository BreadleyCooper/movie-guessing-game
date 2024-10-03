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
//            "vote_average"
//            "vote_count"
//            "status"
//            "release_date"
//            "revenue"
//            "runtime"
//            "adult"
//            "backdrop_path"
//            "budget"
//            "homepage"
//            "imdb_id"
//            "original_language"
//            "original_title"
//            "overview"
//            "popularity"
//            "poster_path"
//            "tagline"
//            "genres"
//            "production_companies"
//            "production_countries"
//            "spoken_languages"
//            "keywords"
        ];
    }
}
