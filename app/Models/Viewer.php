<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Viewer extends Model
{

     protected $fillable = ['personalize'];
     protected $casts = ['personalize' => 'array'];

     public function getPersonalizeAttribute($val) {
        if(isset($val)) return $val ? json_decode($val, true) : [];
        $result = (new \App\Actions\Personalize\PersonalizeViewer())->handle($this);
        $this->update(['personalize' => $result]);
        return $result;
     }

     public function personalizedMovies() {
        $items = collect($this->personalize);
        $itemIds = $items->pluck('itemId');
        // skip the watched ones, can be excluded on filtervars of personalize, items are not imported on this demo
        return Movie::whereIn('id', $itemIds)->whereNotIn('id', $this->watchedIds())->get()->map(function($item) use ($items){
            $item->score = Arr::get($items->where('itemId', $item->id)->values()->first(), 'score');
            return $item;
        });
     }

    /**
     * Get the room of display
     */
    public function tags()
    {
        return $this->hasMany(Tag::class, 'user_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

    public function watchedIds() {
        return $this->tags->pluck('movie_id')->merge($this->ratings->pluck('movie_id'))->unique()->values();
    }

    public function getMoviesAttribute() {
        return Movie::whereIn('id', $this->watchedIds() )->get();
    }
}
