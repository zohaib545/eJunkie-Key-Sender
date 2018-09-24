<?php

namespace App\Http\Middleware;

use App\Package;
use Closure;

class EJunkieAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $package = Package::where('package_hash', $request->unique_id)->first();
        if ($package == null || $request->payer_email == null || $request->txn_id == null) {
            return response()->json(['message' => 'unauthorized'], 401);
        }
        return $next($request);
    }
}
