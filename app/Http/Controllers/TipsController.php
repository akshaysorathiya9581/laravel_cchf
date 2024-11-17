<?php

namespace App\Http\Controllers;

use App\Models\Tips;
use Illuminate\Http\Request;
use App\Models\campaign;
use App\Models\Donations;
use App\Models\DonationTips;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class TipsController extends Controller
{

    public function index($id)
    {
        $campaign = campaign::select('id', 'camp_title')->where('id', $id)->first();
        return view(
            'admin.tips.tips',
            [
                'tips' =>  Tips::where('campaign_id', $id)->get(),
                'campaign' => $campaign,
            ]
        );
    }

    public function DonationTips(Request $request)
    {
        $seasonId = $request->session()->get('season_id');
        $campaigns = campaign::where('season_id', $seasonId)->get();
        return view(
            'admin.tips.donation-tips',
            [
                'campaigns' => $campaigns
            ]
        );
    }
    public function getDonationTipsData(Request $request)
    {
        $data = DonationTips::with('tips', 'donation');

        if ($request->has('search') && $request->search['value'] != '') {
            $searchValue = $request->search['value'];
            $data = $data->where(function ($query) use ($searchValue) {
                $query->where('amount', 'like', "%{$searchValue}%")
                    ->orWhereHas('donation', function ($q) use ($searchValue) {
                        $q->where('donor_first_name', 'like', "%{$searchValue}%")
                            ->orWhere('donor_last_name', 'like', "%{$searchValue}%")
                            ->orWhere(DB::raw("CONCAT(donor_first_name, ' ', donor_last_name)"), 'like', "%{$searchValue}%");
                    })->orWhereHas('tips', function ($q) use ($searchValue) {
                        $q->where('title', 'like', "%{$searchValue}%");
                    });
            });
        }

        $data = $data 
        ->orderBy('donation_id', 'DESC')
        ->get()
            ->groupBy('tips.title')
            ->map(function ($group) {
                $firstItem = $group->first();
                return [
                    'tips_id' => $firstItem->tips->id ?? '',
                    'tips_title' => $firstItem->tips->title ?? '',
                    'total_amount' => $group->sum('amount'),
                    'donor_name' => ($firstItem->donation->donor_first_name ?? '') . ' ' . ($firstItem->donation->donor_last_name ?? ''),
                    'camp_title' => optional($firstItem->donation->campaign)->camp_title ?? '',
                    'donation_id' => $firstItem->donation->id ?? '',
                    'created_at' => Carbon::parse($firstItem->donation->created_at)->format('Y-m-d H:i:s'),
                ];
            })->values();

        return DataTables::of($data)
            ->addColumn('created_at', function ($row) {
                return $row['created_at'];
            })
            ->addColumn('tips_title', function ($row) {
                return $row['tips_title'];
            })
            ->addColumn('total_amount', function ($row) {
                return $row['total_amount'];
            })
            ->addColumn('donor_name', function ($row) {
                return $row['donor_name'];
            })
            ->addColumn('camp_title', function ($row) {
                return $row['camp_title'];
            })
            ->addColumn('action', function ($row) {
                $detailUrl = route('admin.tipsDetails', $row['tips_id']);
                return ' <a href="' . $detailUrl . '" class="btn btn-success" style="font-size: 10px; white-space: nowrap;">
                    <i class="fas fa-info-circle"></i> Tips Details
                </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function tipsDetails($tipID)
    {
        $data = DonationTips::with('tips', 'donation')
            ->whereHas('tips', function ($query) use ($tipID) {
                $query->where('id', $tipID);
            })->get();
        
        return view(
            'admin.tips.tipsDetails',
            [
                'tips' => $data
            ]
        );
    }
    public function update(Request $request, Tips $tips)
    {

        $campaignId = $request->input('campaign_id');
        $tipID = $request->input('tipID') ?? null;
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('admin/campaign/tips/' . $campaignId)
                ->withErrors($validator)
                ->withInput();
        }
        DB::beginTransaction();

        try {
            $Sponsor = Tips::updateOrCreate(
                ['id' => $tipID],
                [
                    'campaign_id'  => $request->campaign_id,
                    'title'  => $request->title,
                    'amount'  => 0
                ]
            );
            DB::commit();
            return redirect()->route('admin.tips', ['id' => $campaignId])->with('success', 'Tip created successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create tip. ' . $e->getMessage());
        }
    }
    public function getSingleTipData(Request $request)
    {
        try {
            $tipID = $request->input('tipID');
            $Tips = Tips::where('id', $tipID)->firstOrFail();
            return response()->json([
                'tips' => $Tips
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($tipID)
    {
        $gift = Tips::findOrFail($tipID);
        $gift->delete();
        return redirect()->back()->with('success', 'Tip deleted successfully.');
    }
}