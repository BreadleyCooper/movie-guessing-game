<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view ('movies', ['movies' => $movies]);
    }
}
