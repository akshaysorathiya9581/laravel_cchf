<?php

namespace App\Http\Middleware;

use App\Models\Seasons;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class SetDatabaseConnection
{

    public function handle(Request $request, Closure $next): Response
    {
        // $user = Auth::user();
        $user = Auth::guard('admin')->user();
        if ($user) {
            $organization = $user->organization;
            if ($organization) {
                // DB::disconnect($organization->database);
                // Config::set('database.connections.tenant.database', $organization->database);
                // DB::purge('tenant');
                // DB::reconnect('tenant');
                // DB::setDefaultConnection('mysql');
            }
        }
        
        if (!$request->session()->has('season_id')) {
            $season = Seasons::first();
            if ($season) {
                $request->session()->put('season_id', $season->id);
            }
        }

        return $next($request);
    }
}
