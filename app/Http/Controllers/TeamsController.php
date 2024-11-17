<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;
use App\Models\campaign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// use Exception;
class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $campaign = campaign::select('id', 'camp_title')->where('id', $id)->first();
        
        return view(
            'admin.teams.teams',
            [
                'teams' =>  Teams::where('campaign_id', $id)->get(),
                'campaign' => $campaign,
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
    public function show(Teams $teams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teams $teams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teams $teams)
    {
        $campaignId = $request->input('campaign_id');
        $TeamId = $request->input('teamId') ?? null;
        // echo $TeamId;die;
        $validator = Validator::make($request->all(), [
            'first_name'  => 'required|string',
            'last_name'  => 'nullable|string',
            'display_name'  => 'required|string',
            'email'  => 'required|string',
            'slug'  => 'required|string',
            'phone_system_code'  => 'nullable|numeric',
            'goal'  => 'required|numeric',
            'currency'  => 'nullable|string',
        ]);

        // if ($validator->fails()) {
        //     return redirect('campaign/teams/' . $campaignId)
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {

            $Teams = Teams::updateOrCreate(
                ['id' => $TeamId],
                [
                    'campaign_id'  => $request->campaign_id,
                    'first_name'  => $request->first_name,
                    'last_name'  => $request->last_name,
                    'display_name'  => $request->display_name,
                    'email'  => $request->email,
                    'slug'  => $request->slug,
                    'phone_system_code'  => $request->phone_system_code,
                    'goal'  => $request->goal,
                    'currency'  =>  $request->currency
                ]
            );
            DB::commit();
            return response()->json(['teams' => $Teams], 201);
            // return redirect()->route('admin.Campaignteams',['id' => $campaignId])->with('success', 'Campaign created successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Error while Creating team: ' . $e->getMessage());
            // return redirect()->back()->with('error', 'Failed to create team. ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update.', 'messages' => $e->getMessage()], 500);
        }
    }

    public function getSingleTeamData(Request $request)
    {
        try {
            $teamId = $request->input('teamId');
            $Team = Teams::where('id', $teamId)->firstOrFail();
            return response()->json([
                'teams' => $Team
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($teamId)
    {
        $teams = Teams::findOrFail($teamId);
        $teams->delete();
        return redirect()->back()->with('success', 'Teams deleted successfully.');
    }
}
