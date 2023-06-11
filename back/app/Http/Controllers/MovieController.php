<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller{
    public function index(){ return Movie::all(); }
    public function store(StoreMovieRequest $request){ return Movie::create($request->all()); }
    public function show(Movie $movie){ return $movie; }
    public function update(UpdateMovieRequest $request, Movie $movie){ return $movie->update($request->all()); }
    public function destroy(Movie $movie){ return $movie->delete(); }
}
