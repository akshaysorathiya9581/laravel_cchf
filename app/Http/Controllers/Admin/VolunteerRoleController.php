<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VolunteerRole;

class VolunteerRoleController extends Controller
{
    // Display a listing of volunteer roles
    public function index()
    {
        $roles = VolunteerRole::all();  // Fetch all volunteer roles
        return view('admin/volunteer/volunteer-roles', compact('roles'));
    }

    // Store a newly created volunteer role in storage
    public function managerole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $blog = VolunteerRole::updateOrCreate(
            ['id' => $request->roleId],
            [
                'name'  => $request->name
            ]
        );
        
        return response()->json([
            'success' => true,
            'message' => 'Role updated successfully'
        ]);
    }

    // Remove the specified volunteer role from storage
    public function destroy(VolunteerRole $volunteerRole)
    {
        $volunteerRole->delete();

        return redirect()->route('volunteerRoles.index')->with('success', 'Role deleted successfully.');
    }
}
