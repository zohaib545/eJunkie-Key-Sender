<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameKey;
use DB;
use Illuminate\Http\Request;

class KeysController extends Controller
{
    /**
     * index
     * Returns a view with all game keys
     */
    public function index(Game $game)
    {
        $keys = $game->keys;
        return view('pages.games.keys.index')->with(['game_keys' => $keys, 'game' => $game]);
    }

    /**
     * upload
     * Return a view to upload game keys through a txt file
     */
    public function upload(Game $game)
    {
        return view('pages.games.keys.upload')->with(['game' => $game]);
    }

    /**
     * add
     * Add keys from the file
     */
    public function add(Request $request)
    {
        $handle = fopen($request->file('keys'), "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = substr_replace($line, "", -2);
                $insert[] = [
                    'game_id' => $request->game_id,
                    'key' => $line,
                    'is_used' => false,
                ];
            }
            if (!empty($insert)) {
                DB::table('game_keys')->insert($insert);
            }
            fclose($handle);
        } else {
            // error opening the file.
        }
        return redirect("games/$request->game_id/keys");
    }

    /**
     * delete
     * Delete a game key and redirect to previous page
     */
    public function delete(Request $request)
    {
        $game_key = GameKey::find($request->id);
        $game_key->delete();
        return redirect()->back();
    }

    /**
     * delete_all
     * Delete all keys of a game
     */
    public function delete_all(Request $request)
    {
        $game = Game::find($request->id);
        $game->keys()->delete();
        return redirect()->back();
    }
}
