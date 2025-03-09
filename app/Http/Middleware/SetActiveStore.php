<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Store;
use Config;

class SetActiveStore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     $host = $request->getHost();
    //    // dd($host);
    //     $store = Store::where('domain',$host)->firstOrFail();
    //   App()->instance('store.active',$store);
    //   $db = $store->database_options['dbname'];
    //   Config::set('database.connections.tenant.database',$db);
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
       // dd($host);
        $store = Store::where('domain',$host)->firstOrFail();

        \App::instance('store.active',$store);

        $db = $store->database_options['dbname'];
        Config::set('database.connections.tenant.database',$db);
         return $next($request);
    }
}
