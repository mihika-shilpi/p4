<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    public function wishes()
    {
        # writer has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('App\Wish');
    }

    public function getName() {
        return $this->name;
    }
}
