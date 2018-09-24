<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bundle;
use \App\Package;

class PackagesController extends Controller
{
    /**
     * index
     * To view all packages
     */
    public function index()
    {
        $packages = Package::with(['bundle'])->get();
        return view('pages.packages.index', ['packages' => $packages]);
    }

    /**
     * create
     * Returns view to create packages
     */
    public function create()
    {
        $bundles = Bundle::all();
        return view('pages.packages.create', ['bundles' => $bundles]);
    }

    /**
     * store
     * To store a package and redirect to index page
     */
    public function store(Request $request)
    {
        $package = new Package();
        $package->bundle_id = $request->bundle;
        $package->quantity = $request->quantity;
        $package->package_hash = uniqid(date('his'));
        $package->save();
        return redirect('packages');
    }

    /**
     * edit
     * Return view to edit a package
     */
    public function edit(Package $package)
    {
        $bundles = Bundle::all();
        return view('pages.packages.edit', ['bundles' => $bundles, 'package' => $package]);
    }

    /**
     * update
     * To update package details
     */
    public function update(Request $request)
    {
        $package = Package::find($request->id);
        $package->bundle_id = $request->bundle;
        $package->quantity = $request->quantity;
        $package->save();
        return redirect('packages');
    }

    /**
     * delete
     * To delete a package
     */
    public function delete(Request $request)
    {
        $package = Package::find($request->id);
        $package->delete();
        return redirect('packages');
    }
}
