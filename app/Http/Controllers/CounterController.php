<?php

namespace App\Http\Controllers;

use App\Bundle;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function get_counter(Request $request)
    {
        $bundle = Bundle::find($request->bundle_id);
        return response()->json([
            'unit' => intval($bundle->bundles_sold / 1)%10,
            'ten' => intval($bundle->bundles_sold / 10)%10,
            'hundred' => intval($bundle->bundles_sold / 100)%10,
            'thousand' => intval($bundle->bundles_sold / 1000)%10,
        ], 200);
    }
}
