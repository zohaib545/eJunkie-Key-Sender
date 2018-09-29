<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected static function boot() {
        parent::boot();
        static::deleting(function($bundle) {
            $bundle->bundle_games()->delete();
            $bundle->packages()->delete();
        });
    }

    public function bundle_games(){
        return $this->hasMany('App\BundleGame');
    }

    public function games(){
        return $this->belongsToMany('App\Game', 'bundle_games');
    }

    public function packages(){
        return $this->hasMany('App\Package');
    }
}
