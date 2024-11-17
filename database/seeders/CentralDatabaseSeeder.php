<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CentralDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Create an organization
        $organization = Organization::firstOrCreate([
            'database' => 'tenant1_database',
        ],[
            'name' => 'Tenant One',
            'database' => 'tenant1_database',
        ]);

        // // Create a user for the organization
        User::firstOrCreate([
           'email' => 'admin@tenant1.com',
        ],[
            'name' => 'Admin User',
            'email' => 'admin@tenant1.com',
            'password' => Hash::make('password'),
            'organization_id' => $organization->id,
        ]);

        // // Repeat for another organization and user
        $organization2 = Organization::firstOrCreate([
            'database' => 'tenant2_database',
        ],[
            'name' => 'Tenant Two',
            'database' => 'tenant2_database',
        ]);

        User::firstOrCreate(
            [
                'email' => 'admin@tenant2.com',
            ],
            [
            'name' => 'Admin User',
            'email' => 'admin@tenant2.com',
            'password' => Hash::make('password'),
            'organization_id' => $organization2->id,
        ]);
    }
}
