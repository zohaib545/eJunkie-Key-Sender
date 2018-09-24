<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function bundle()
    {
        return $this->belongsTo('App\Bundle');
    }
}
