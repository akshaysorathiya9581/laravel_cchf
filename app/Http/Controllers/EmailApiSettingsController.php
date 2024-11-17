<?php

namespace App\Http\Controllers;

use App\Models\EmailApiSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;

class EmailApiSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiSetting = EmailApiSettings::first();
       return view('admin.setting.email-api-settings',
       [
        'settings' => $apiSetting
       ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailApiSettings $emailApiSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailApiSettings $emailApiSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailApiSettings $emailApiSettings)
    {
        $emailApiID = $request->input('emailApiID') ?? null;
        $validator = Validator::make($request->all(), [
            'api_key'  => 'nullable|string',
            'from_email'  => 'nullable|string',
            'from_name'  => 'nullable|string',
            'reply_to'  => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        DB::beginTransaction();

        try {

            $Sponsor = EmailApiSettings::updateOrCreate(
                ['id' => $emailApiID],
                [
                    'api_key'  => $request->api_key,
                    'from_email'  => $request->from_email,
                    'from_name'  => $request->from_name,
                    'reply_to'  => $request->reply_to
                ]
            );
            DB::commit();
            return redirect()->route('admin.emailApiSettings')->with('success', 'Api Setting Updated successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            // Log::error('Error while Creating or updating a gift: ' . $e->getMessage());
            return redirect()->back()->with('error','Failed to create sponsor. ' . $e->getMessage());
            // return response()->json(['error' => 'Failed!.', 'messages' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailApiSettings $emailApiSettings)
    {
        //
    }
}
