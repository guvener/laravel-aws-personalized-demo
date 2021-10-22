<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
      /**
     * Get the room of display
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
