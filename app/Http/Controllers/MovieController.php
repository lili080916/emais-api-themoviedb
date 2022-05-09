<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Traits\ApiTheMovieDB;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Models\Movie;

class MovieController extends Controller
{
    use ApiTheMovieDB;

    const STATUS_CODE = [34, 7];

    // get all movies
    public function getAllMovies()
    {
        $movies = Movie::paginate(10);

        return MovieCollection::make($movies);
    }

    // get movie by id
    public function getMovieById($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response(['data' => 'Not found'], 404);
        }

        return MovieResource::make($movie);
    }

    // create movie and get data from developers.themoviedb.org
    public function createMovie(StoreMovieRequest $request)
    {
        try {
            $movieApiDetails = $this->getMovieDetails($request->moviedb_id);

            if (isset($movieApiDetails['status_code']) && in_array($movieApiDetails['status_code'], self::STATUS_CODE)) {
                return throw new Exception($movieApiDetails['status_message']);
            }

            $movie = new Movie();
            $movie->name = $request->name;
            $movie->moviedb_id = $request->moviedb_id;
            $movie->full_details = json_encode($movieApiDetails);
            $movie->save();

        } catch (Exception $e) {
            return response()->json([
                'data' => $e->getMessage()
            ], 501);
        }

        return MovieResource::make($movie);
    }
}
