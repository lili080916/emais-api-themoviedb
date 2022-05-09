<?php

namespace Database\Factories;

use App\Http\Traits\ApiTheMovieDB;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    use ApiTheMovieDB;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $moviedb_id = (string) $this->faker->unique()->numberBetween(100, 10000);
        $movieApiDetails = $this->getMovieDetails($moviedb_id);

        return [
            'moviedb_id' => $moviedb_id,
            'name' => $this->faker->name(),
            'full_details' => json_encode($movieApiDetails)
        ];
    }
}
