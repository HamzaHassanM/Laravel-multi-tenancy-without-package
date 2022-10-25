<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $tenant = Tenant::where('domain',$host)->first();
        \DB::purge('system');
        \Config::set('database.connections.tenant.database' , $tenant->database);
        \DB::connection('tenant')->reconnect();
        \DB::setDefaultConnection('tenant');
        return $next($request);
    }
}
