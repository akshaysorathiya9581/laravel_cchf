<?php

namespace App\Http\Controllers;

use App\Models\CampaignSplitPot;
use Illuminate\Http\Request;
use App\Models\campaign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CampaignSplitPotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $campaign = campaign::select('id','camp_title')->where('id',$id)->first();
        return view(
            'admin.split_pot.split_pot',
            [
                'split_pot' =>  CampaignSplitPot::where('campaign_id',$id)->get(),
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
    public function show(CampaignSplitPot $campaignSplitPot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampaignSplitPot $campaignSplitPot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignSplitPot $campaignSplitPot)
    {
        $campaignId = $request->input('campaign_id');
        $StpId = $request->input('StpId') ?? null;
        // echo $TeamId;die;
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'amount'  => 'required|numeric',
            'entries'  => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('campaign/split-pot/' . $campaignId)
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {



            $STP = CampaignSplitPot::updateOrCreate(
                ['id' => $StpId],
                [
                    'campaign_id'  => $request->campaign_id,
                    'title'  => $request->title,
                    'amount'  => $request->amount,
                    'entries'  => $request->entries
                ]
            );
            DB::commit();

            return redirect()->route('admin.split-pot',['id' => $campaignId])->with('success', 'STP created successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Error while Creating or updating STP: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create STP. ' . $e->getMessage());
        }
    }
public function getSinglesplitPotData(Request $request){
    try {
        $StpId = $request->input('StpId');
        $STP = CampaignSplitPot::where('id', $StpId)->firstOrFail();
        return response()->json([
            'split_the_pot' => $STP
        ], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($stpId)
    {
        $stp = CampaignSplitPot::findOrFail($stpId);
        $stp->delete(); 
        return redirect()->back()->with('success', 'Split the Pot deleted successfully.');
    }
}
