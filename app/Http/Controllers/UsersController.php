<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use Exception;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $organizations = Organization::all();

        // dd(request());
        if (request()->expectsJson()) {
            return response()->json(compact('users', 'organizations'));
        }

        return view('admin.setting.users', compact('users', 'organizations'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => 'required|string',
            'role' => 'required|string',
            'organization_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            return redirect('admin/setting/users')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'organization_id' => $request->organization_id
            ]);

            DB::commit();

            if ($request->expectsJson()) {
                return response()->json(['user' => $user, 'message' => 'User created successfully'], 201);
            }

            return redirect()->route('admin.users')->with('success', 'User created successfully');
        } catch (Exception $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return response()->json(['error' => 'Failed to create User. ' . $e->getMessage()], 500);
            }
            Log::error('Error while Creating User: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create User. ' . $e->getMessage());
        }
    }

    public function update(Request $request, User $user)
    {
        $userId = $request->input('userId');
        $User = User::findOrFail($userId);
        // print_r($request->all());die;
        $validator =  Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $User->id,
            'password' => 'nullable|string',
            'role' => 'required|string',
            'organization_id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {


            $User = User::findOrFail($userId);
            $updateUser = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'organization_id' => $request->organization_id
            ];

            if (!empty($request->password)) {
                $updateUser['password'] = Hash::make($request->password);
            }
            $User->update($updateUser);
            DB::commit();

            return redirect()->route('admin.users')->with('success', 'User updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to update User. ' . $e->getMessage()]);
        }
    }

    public function changeSendMail(Request $request){
        DB::beginTransaction();


        try {
            $userId = $request->input('userId');
            $User = User::findOrFail($userId);
            $sendEmail = $request->input('sendEmail');
            $users = $User->update(
                [
                    'send_email'  => $sendEmail
                ]
            );
            DB::commit();

            return response()->json(['user' => $users], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
        }
    }
    public function getSingleUser(Request $request){
        try {
            $userId = $request->input('userId');
            $user = User::where('id', $userId)->firstOrFail();
            return response()->json([
                'user' => $user,
                'organizations' => Organization::all()
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
