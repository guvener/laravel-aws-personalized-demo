<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(){
        return view('viewers.movies', ['movies' => Movie::paginate(20)]);
    }
}
