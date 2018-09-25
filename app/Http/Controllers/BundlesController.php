<?php

namespace App\Http\Controllers;

use App\Bundle;
use App\Game;
use DB;
use Illuminate\Http\Request;

class BundlesController extends Controller
{
    /**
     * index
     * Return the index view for all bundles
     */
    public function index()
    {
        $bundles = Bundle::all();
        return view('pages.bundles.index', ['bundles' => $bundles]);
    }

    /**
     * create
     * Return the view to create a bundle
     */
    public function create()
    {
        $games = Game::all();
        return view('pages.bundles.create', ['games' => $games]);
    }

    /**
     * store
     * Stores a bundle and redirects to the index page
     */
    public function store(Request $request)
    {
        $bundle = new Bundle();
        $bundle->name = $request->name;
        $bundle->save();
        foreach ($request->games as $game) {
            $insert[] = [
                'bundle_id' => $bundle->id,
                'game_id' => $game,
            ];
        }
        if (!empty($insert)) {
            DB::table('bundle_games')->insert($insert);
        }
        return redirect('bundles');
    }

    /**
     * edit
     * returns a view to edit the bundle
     */
    public function edit(Bundle $bundle)
    {
        $games = Game::all();
        $bundle_games = $bundle->games;
        $games = $games->map(function ($item, $key) use ($bundle_games) {
            if ($bundle_games->where('id', $item->id)->first() != null) {
                $item->selected = true;
            } else {
                $item->selected = false;
            }

            return $item;
        });
        return view('pages.bundles.edit', ['games' => $games, 'bundle' => $bundle]);
    }

    /**
     * update
     * updates a bundle
     * delete previous bundle games and adds again
     * updates name as well
     */
    public function update(Request $request)
    {
        $bundle = Bundle::find($request->id);
        $bundle->name = $request->name;
        $bundle->bundles_sold = $request->counter;
        $bundle->save();
        $bundle->bundle_games()->delete();
        foreach ($request->games as $game) {
            $insert[] = [
                'bundle_id' => $bundle->id,
                'game_id' => $game,
            ];
        }
        if (!empty($insert)) {
            DB::table('bundle_games')->insert($insert);
        }
        return redirect('bundles');
    }

    /**
     * delete
     * delete a bundle and return to the previous page
     */
    public function delete(Request $request)
    {
        $bundle = Bundle::find($request->id);
        $bundle->delete();
        return redirect()->back();
    }
}
