<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Artisan;

class OrganizationController extends Controller
{

    public function index()
    {
        return view(
            'admin.organization.organization',
            [
                'organizations' =>  Organization::all()
            ]
        );
    }



    public function update(Request $request, Organization $organization)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|string',
            'title' => 'required|string',
            'email' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $organizationName = $request->input('name');

        $databaseName = 'org_' . strtolower(preg_replace('/\s+/', '_', $organizationName));


        DB::statement("CREATE DATABASE $databaseName");

        $organization = Organization::create([
            'name' => $organizationName,
            'database' => $databaseName
        ]);

        // DB::connection('central')->table('organization')->insert([
        //     'name' => $request->name,
        //     'database' => $request->name
        // ]);


        $this->setupDatabase($databaseName);

        return redirect()->back()->with('success', 'Organization created!');
    }
    public function getSingleOrganization(Request $request)
    {
        try {
            $organizationId = $request->input('organizationId');
            $organization = Organization::where('id', $organizationId)->firstOrFail();
            return response()->json([
                'organization' => $organization
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    protected function setupDatabase($databaseName)
    {
        config(['database.connections.tenant.database' => $databaseName]);


        DB::purge('tenant');
        DB::reconnect('tenant');


        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => '/database/migrations',
            '--force' => true,
        ]);


        Artisan::call('db:seed', [
            '--database' => 'tenant',
            '--force' => true,
        ]);
    }

    public function destroy($organizationId)
    {
        $organization = Organization::findOrFail($organizationId);
        $organization->delete(); 
        return redirect()->back()->with('success', 'Organization deleted successfully.');
    }
}
