<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * index
     * Return the view for all games
     */
    public function index()
    {
        $games = Game::all();
        return view('pages.games.index')->with(['games' => $games]);
    }

    /**
     * create
     * Return the view to create a game
     */
    public function create()
    {
        return view('pages.games.create');
    }

    /**
     * store
     * Store game to database
     */
    public function store(Request $request)
    {
        $game = new Game();
        $game->name = $request->name;
        $game->save();
        return redirect('games');
    }

    /**
     * delete
     * To delete a game and redirect to all games page
     */
    public function delete(Request $request)
    {
        $game = Game::find($request->id);
        $game->delete();
        return redirect('games');
    }

    /**
     * edit
     * Return view to edit game
     */
    public function edit(Game $game)
    {
        return view('pages.games.edit')->with(['game' => $game]);
    }

    /**
     * update
     * Updtes a game and returns to all games page
     */
    public function update(Request $request)
    {
        $game = Game::find($request->id);
        $game->name = $request->name;
        $game->save();
        return redirect('games');
    }
}
