<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupons;
use App\Models\campaign;
use App\Models\CampaignCoupons;
use App\Models\Seasons;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class couponController extends Controller
{
    public function index(Request $request)
    {

        // $season = Seasons::where('status', 1)->first();
        $seasonId = $request->session()->get('season_id') ?? null;

        // $season = current_season();
        // dd($season->id);
        return view(
            'admin.coupons.coupons',
            [
                'coupons' => Coupons::where('season_id', $seasonId)->get(),
                'campaigns' => campaign::all(),
                'seasons' => Seasons::all()
            ],
        );
    }

    public function update(Request $request, Coupons $coupons)
    {
        // print_r($request->all());die;



        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'type' => 'required|string',
            'minimum_amount' => 'required|numeric',
            'discount_amount' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'multiplyer' => 'required|numeric',
            'campaign_id' => 'required|array',
            'season_id' => 'required|numeric'

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {

            $couponId = $request->input('couponId') ?? null;


            $Coupons = Coupons::updateOrCreate(
                ['id' => $couponId],
                [
                    'title'  => $request->title,
                    'type' => $request->type,
                    'minimum_amount' => $request->minimum_amount,
                    'discount_amount' => $request->discount_amount,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'multiplyer' => $request->multiplyer,
                    'season_id' => $request->season_id
                ]
            );

            $campaign_id = $request->input('campaign_id', []);
            $couponId = $Coupons->id;

            CampaignCoupons::where('coupon_id', $couponId)->delete();
            foreach ($campaign_id as $campaignId) {

                $CampaignCoupons =  CampaignCoupons::create(
                    [
                        'coupon_id' => $couponId,
                        'campaign_id' => $campaignId,
                    ]
                );
            }
            DB::commit();

            return response()->json(['Coupons' => $Coupons, 'CampaignCoupons' => $CampaignCoupons, 'success' => 'Coupon updated'], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
        }
    }
    public function getCouponSingledata(Request $request)
    {

        try {
            $couponId = $request->input('couponId');
            $coupons = Coupons::where('id', $couponId)->firstOrFail();
            $campaign_coupons = CampaignCoupons::where('coupon_id', $couponId)->get();
            $campaigns = campaign::select('id', 'camp_title')->get();
            return response()->json([
                'coupons' => $coupons,
                'campaign_coupons' => $campaign_coupons,
                'campaigns' => $campaigns,
                'seasons' => Seasons::all()
                // 'season_id' => 1, #TODO make a logic for season
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function destroy($couponId)
    {
        $coupon = Coupons::findOrFail($couponId);
        $coupon->delete(); 
        return redirect()->back()->with('success', 'Coupon deleted successfully.');
    }
}
