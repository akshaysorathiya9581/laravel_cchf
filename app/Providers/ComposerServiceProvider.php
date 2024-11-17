<?php

namespace App\Providers;

use App\Models\Seasons;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $user = Auth::guard('admin')->user();
            if ($user) {
                $organization = $user->organization;
                if ($organization) {
                    // Config::set('database.connections.tenant.database', $organization->database);
                    // DB::purge('tenant');
                    // DB::reconnect('tenant');
                    // DB::setDefaultConnection('tenant');
                }
                // dd(DB::getConfig());
                $seasons = Seasons::all();
                $view->with('seasons', $seasons);
            }
        });
    }
}
