<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class SetTenantDatabaseConnection
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Authenticated $event)
    {
        $user = $event->user;
        $organization = $user->organization;

        if ($organization) {
            // Config::set('database.connections.tenant.database', $organization->database);
            // DB::purge('tenant');
            // DB::reconnect('tenant');
            // DB::setDefaultConnection('tenant');
        }
    }
}
