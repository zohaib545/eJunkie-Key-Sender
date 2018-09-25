<?php

namespace App\Http\Controllers;

use App\Bundle;
use App\Game;
use App\GameKey;
use App\Purchase;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    /**
     * index
     * download index page
     */
    public function index()
    {
        $games = Game::all();
        $bundles = Bundle::all();
        return view('pages.downloads.index', ['games' => $games, 'bundles' => $bundles]);
    }

    /**
     * download_unused_codes
     * download unused codes
     */
    public function download_unused_codes(Request $request)
    {
        $game = Game::find($request->game);
        $gameKeys = GameKey::select('key')->where([['game_id', '=', $request->game], ['is_used', '=', 0]])->get();
        $txt = null;
        foreach ($gameKeys as $gameKey) {
            $txt .= $gameKey->key;
            $txt .= "\r\n";
        }
        return response($txt)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="' . $game->name . '-unused.txt',
            ]);
    }

    /**
     * download_codes
     * download codes for a game
     */
    public function download_codes(Request $request)
    {
        $game = Game::find($request->game);
        $gameKeys = Game::find($request->game)->game_key($request->quantity)->pluck('key');
        $txt = null;
        foreach ($gameKeys as $gameKey) {
            $txt .= $gameKey;
            $txt .= "\r\n";
        }
        return response($txt)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="' . $game->name . '.txt',
            ]);
    }

    /**
     * download_emails
     * download emails of the users from purchases
     */
    public function download_emails(Request $request)
    {
        $bundle = Bundle::find($request->bundle);
        $emails = Purchase::select('email')->where([['bundle_id', '=', $request->bundle]])->distinct()->get();
        $txt = null;
        foreach ($emails as $email) {
            $txt .= $email->email;
            $txt .= ";";
        }
        return response($txt)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="' . $bundle->name . '-emails.txt',
            ]);
    }
}
