<?php

namespace App\Http\Controllers;

use App\Bundle;

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
}
