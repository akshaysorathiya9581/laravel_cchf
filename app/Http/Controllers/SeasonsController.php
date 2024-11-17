<?php

namespace App\Http\Controllers;

use App\Models\Seasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Exception;

class SeasonsController extends Controller
{

    public function index()
    {
        return view(
            'admin.setting.seasons',
            [
                'seasons' =>  Seasons::all()
            ]
        );
    }


    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        if ($validator->fails()) {
            return redirect('admin/setting/seasons')
                ->withErrors($validator)
                ->withInput();
        }
        DB::beginTransaction();

        try {

            $user = Seasons::create([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            DB::commit();

            return redirect()->route('admin.seasons')->with('success', 'Season created successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Error while Creating season: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create Season. ' . $e->getMessage());
        }
    }
    public function update(Request $request, Seasons $seasons)
    {
        // print_r($request->all());die;
        $validator =  Validator::make($request->all(), [
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {

            $seasonId = $request->input('seasonId');


            $Season = Seasons::findOrFail($seasonId);
            $Season->update([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            DB::commit();

            return redirect()->route('admin.seasons')->with('success', 'Season Updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error while updating season: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update Season. ' . $e->getMessage());
        }
    }
    public function getSingleSeason(Request $request)
    {

        try {
            $seasonId = $request->input('seasonId');
            $season = Seasons::where('id', $seasonId)->firstOrFail();
            return response()->json([
                'season' => $season
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function setSeason(Request $request)
    {
        $request->session()->put('season_id', $request->season_id);
        return response()->json(['status' => 'success']);
    }

    public function destroy($seasonId)
    {
        $season = Seasons::findOrFail($seasonId);
        $season->delete(); 
        return redirect()->back()->with('success', 'Season deleted successfully.');
    }
}
