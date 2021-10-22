<?php

namespace App\Actions\Personalize;

use Illuminate\Support\Facades\Http;
use Cache;
use App\Models\Viewer;

class ImdbMeta
{
    /**
     * Get imdb meta data for the movie from open movie database api.
     *
     * @param  array $imdb metadata
     * @return void
     */
    public function handle($imdb_id)
    {
        if( config('personalize.omdb_key') == null || empty($imdb_id) ) return null;

        return Cache::rememberForever("imdb-{$imdb_id}", function() use ($imdb_id) {
            try {
                $url = "http://www.omdbapi.com/?i={$imdb_id}&apikey=". config('personalize.omdb_key');
                $response = Http::get($url);
            } catch (\Exception $e) {
                return null;
            }

            if($response->failed())
                return null;

            return $response->json();
        });
    }
}
