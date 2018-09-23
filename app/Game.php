<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected static function boot() {
        parent::boot();
        static::deleting(function($game) {
            $game->keys()->delete();
        });
    }

    public function keys()
    {
        return $this->hasMany('App\GameKey');
    }
}
