<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Link extends Model
{
    public $timestamps = false;

    // Format movielens imdb_id to omdbapi compatible format.
    public function getImdbAttribute() {
        return "tt". substr('0000000' . $this->imdb_id, -7);;
    }

    public function fetchImdb() {
        return (new \App\Actions\Personalize\ImdbMeta)->handle($this->imdb);
    }
}
