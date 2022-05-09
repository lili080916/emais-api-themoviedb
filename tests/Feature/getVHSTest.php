<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Movie;

class getVHSTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_movie_details()
    {
        $movie = Movie::factory()->times(3)->create();

        $response = $this->getJson(route('api.movie.index'));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [
                    'id' => $movie[0]->getRouteKey(),
                    'name' => $movie[0]->name,
                    'moviedb_id' => $movie[0]->moviedb_id,
                    'full_details' => [],
                    'links' => [
                        'self' => route('api.movie.show', $movie[0]->getRouteKey()),
                    ]
                ],
                [
                    'id' => $movie[1]->getRouteKey(),
                    'name' => $movie[1]->name,
                    'moviedb_id' => $movie[1]->moviedb_id,
                    'full_details' => [],
                    'links' => [
                        'self' => route('api.movie.show', $movie[1]->getRouteKey()),
                ]
                ],
                [
                    'id' => $movie[2]->getRouteKey(),
                    'name' => $movie[2]->name,
                    'moviedb_id' => $movie[2]->moviedb_id,
                    'full_details' => [],
                    'links' => [
                        'self' => route('api.movie.show', $movie[2]->getRouteKey()),
                    ]
                ]
            ],
            'links' => [
                'self' => route('api.movie.index'),
            ],
            'meta' => []
        ]);
    }

    /** @test */
    public function get_single_movie_by_id()
    {
        $movie = Movie::factory()->create();

        $response = $this->getJson(route('api.movie.show', $movie->getRouteKey()));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $movie->getRouteKey(),
                'name' => $movie->name,
                'moviedb_id' => $movie->moviedb_id,
                'full_details' => [],
                'links' => [
                    'self' => route('api.movie.show', $movie->getRouteKey()),
                ]
            ]
        ]);
    }

    /** @test */
    public function create_movie_with_details_from_api_themoviedb()
    {
        $movie = array(
            'name' => 'test',
            'moviedb_id' => 123
        );

        $response = $this->postJson(route('api.movie.store', $movie));

        $movie = Movie::first();

        $response->assertJson([
            'data' => [
                'id' => $movie->id,
                'name' => $movie->name,
                'moviedb_id' => $movie->moviedb_id,
                'full_details' => [],
                'links' => [
                    'self' => route('api.movie.show', $movie->id),
                ]
            ]
        ]);
    }
}
