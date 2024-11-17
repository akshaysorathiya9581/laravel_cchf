<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee']);

        // Find users
        $adminUser = User::find(1);
        $employeeUser = User::find(2);

        // Assign roles to users
        if ($adminUser) {
            $adminUser->assignRole($adminRole);
        } else {
            // Handle the case where the admin user is not found, e.g., log a warning or create the user
            $this->command->warn('Admin user with ID 1 not found.');
        }

        if ($employeeUser) {
            $employeeUser->assignRole($employeeRole);
        } else {
            // Handle the case where the employee user is not found, e.g., log a warning or create the user
            $this->command->warn('Employee user with ID 2 not found.');
        }
    }
}
