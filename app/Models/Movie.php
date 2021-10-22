<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Movie extends Model
{
    protected $fillable = ['title', 'genres','updated_at', 'meta'];
    protected $casts = ['meta' => 'array'];
    public $score;

    public function getMeta() {
        if(isset($this->meta)) return $this->meta ? $this->meta : [];
        $result = isset( $this->link) ? $this->link->fetchImdb() : [];
        $this->update(['meta' => $result]);
        return $result;
    }

    public function metadata($key){
        return Arr::get($this->getMeta(), $key);
    }

    /**
     * Get the room of display
     */
    public function link()
    {
        return $this->hasOne(Link::class);
    }
}
