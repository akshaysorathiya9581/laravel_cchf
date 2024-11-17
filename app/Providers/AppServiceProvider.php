<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Seasons;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $seasons = Seasons::all();
        //     View::share('seasons', $seasons);


        Blade::directive('is_admin', function ($role) {


            return "<?php if(auth()->check() && auth()->user()->role == $role): ?>";
        });

        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });


        // dd(DB::getConfig());
    }
}
