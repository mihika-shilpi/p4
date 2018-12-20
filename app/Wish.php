<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    public function writer()
    {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Writer');
    }

    public function tags()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
