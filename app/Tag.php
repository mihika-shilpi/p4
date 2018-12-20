<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function wishes() {
        return $this->belongsToMany('App\Wish')->withTimestamps();
    }
}
