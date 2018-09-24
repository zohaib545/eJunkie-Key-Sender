<?php

namespace App\Http\Controllers;

use App\Package;
use App\Purchase;
use DB;
use Illuminate\Http\Request;

class KeygenController extends Controller
{
    /**
     * Requested by eJunkie
     * Send keys to the user
     * Function is protected by middleware
     */
    public function send_keys(Request $request)
    {
        $package = Package::where('package_hash', $request->unique_id)->with(['bundle', 'bundle.games'])->first();
        $purchase = new Purchase();
        $purchase->bundle_id = $package->bundle_id;
        $purchase->package_id = $package->id;
        $purchase->amount = $request->mc_gross;
        $purchase->first_name = $request->first_name;
        $purchase->last_name = $request->last_name;
        $purchase->email = $request->payer_email;
        $purchase->transaction_id = $request->txn_id;
        $purchase->phone = $request->payer_phone;
        $purchase->payment_date = $request->payment_date;
        $purchase->bundle_name = $package->bundle->name;
        $bundle = $package->bundle;
        $bundle->bundles_sold += $package->quantity;
        $bundle->save();
        $purchase->save();
        $purchase_details = [];
        $delivery = [];
        foreach ($package->bundle->games as $game) {
            $game_keys = $game->game_key($package->quantity);
            $delivery[$game->id] = ['id' => $game->id, 'name' => $game->name, 'keys' => []];
            foreach ($game_keys as $game_key) {
                $purchase_details[] = [
                    'game_id' => $game->id,
                    'purchase_id' => $purchase->id,
                    'game_name' => $game->name,
                    'key' => $game_key->key,
                ];
                $delivery[$game->id]['keys'][] = [
                    $game_key->key,
                ];
            }
        }
        if (!empty($purchase_details)) {
            DB::table('purchase_details')->insert($purchase_details);
        }
        return view('game_keys', ['game_keys' => $delivery]);
    }
}
