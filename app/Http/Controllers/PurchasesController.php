<?php

namespace App\Http\Controllers;

use App\Purchase;

class PurchasesController extends Controller
{
    /**
     * index
     * get the details page
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('pages.purchases.index', ['purchases' => $purchases]);
    }
}
