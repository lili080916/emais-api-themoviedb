<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;
use Exception;

trait ApiTheMovieDB {

    // get data from developers.themoviedb.org
    public function getMovieDetails($id)
    {
        $api_key = config('themoviedb.themoviedb_key');
        $api_url = config('themoviedb.themoviedb_url');

        try {
            $response = Http::get($api_url.$id, [
                'api_key' => $api_key
            ]);

            $movie = json_decode($response->body(), true);

            return $movie;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
