<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Viewer;
use App\Models\Movie;
use App\Models\Tag;

class ViewerController extends Controller
{
    public function index(Request $request) {

        $movie = null;
        if($request->filled('movie_id')) {
            $movie = Movie::find($request->movie_id);
        }
        $viewers = Viewer::withCount(['tags', 'ratings'])->when(isset($movie), function($query) use ($movie) {
            $query->whereExists(function ($query) use ($movie) {
               $query->select(\DB::raw(1))
                     ->from('tags')
                     ->where('movie_id', $movie->id)
                     ->whereColumn('tags.user_id', 'viewers.id');
            });
        })->paginate(20);

        return view('viewers.index', compact('viewers', 'movie'));
    }

    public function show(Viewer $viewer){
        $viewer->load(['tags', 'ratings']);
        $movies = $viewer->movies->keyBy('id');
        $tags = $viewer->tags->groupBy('movie_id');
        $ratings = $viewer->ratings->groupBy('movie_id');
        return view('viewers.show', compact('viewer', 'movies', 'tags', 'ratings'));
    }

    public function random(){
        $viewer = Viewer::inRandomOrder()->first();
        if(!isset($viewer))
        {
            \Log::error("Viewers table is empty.");
            abort(404);
        }
        return $this->show($viewer);
    }
}
