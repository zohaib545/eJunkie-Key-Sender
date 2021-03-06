<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($game) {
            $game->keys()->delete();
            $game->bundle_games()->delete();
        });
    }

    public function keys()
    {
        return $this->hasMany('App\GameKey');
    }

    public function bundle_games()
    {
        return $this->hasMany('App\BundleGame');
    }

    public function unused_keys()
    {
        return $this->keys()->where('is_used', false);
    }

    public function keys_count()
    {
        return $this->hasOne('App\GameKey')
            ->selectRaw('game_id, count(*) as count')->groupBy('game_id');;
    }

    public function unused_keys_count()
    {
        return $this->keys_count()->where('is_used', false);
    }

    public function game_key($qty = 1)
    {
        $result = null;
        DB::transaction(function () use ($qty, &$result) {
            $result = DB::table('game_keys')->where([['is_used', '=', 0], ['game_id', '=', $this->id]])->limit($qty)->get();
            $selectedRows = $result->pluck('id')->toArray();
            DB::table('game_keys')->whereIn('id', $selectedRows)->update(['is_used' => 1]);
        }, 5);
        return $result;
    }
}
