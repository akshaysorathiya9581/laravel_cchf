<?php

namespace App\Http\Controllers;

use App\Models\CampaignGifts;
use Illuminate\Http\Request;
use App\Models\campaign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Illuminate\Support\Facades\Log;
use Exception;

class CampaignGiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }
    public function index($id)
    {
        $campaign = campaign::select('id','camp_title')->where('id',$id)->first();
        return view(
            'admin.gifts.gifts',
            [
                'gifts' =>  CampaignGifts::where('campaign_id',$id)->get(),
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
    public function show(CampaignGifts $campaignGifts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampaignGifts $campaignGifts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignGifts $campaignGifts)
    {
        $campaignId = $request->input('campaign_id');
        $giftId = $request->input('giftId') ?? null;
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string',
            'amount'  => 'required|numeric',
            'draw_date' => 'nullable|date',
            'image' => 'nullable|image',
            'old_image' => 'nullable|string',
            'details' => 'nullable|string'
        ]);

        // if ($validator->fails()) {
        //     return redirect('campaign/gifts/' . $campaignId)
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }
        DB::beginTransaction();

        try {
            $fileUrl = $request->hasFile('image')
            ? $this->fileUploadService->uploadFile($request, 'image', 'campaign_gifts'): $request->input('old_image');
            $fileURL = $fileUrl ?? " ";
            $Gift = CampaignGifts::updateOrCreate(
                ['id' => $giftId],
                [
                    'campaign_id'  => $request->campaign_id,
                    'name'  => $request->name,
                    'amount'  => $request->amount,
                    'draw_date'  => $request->draw_date,
                    'details'  => $request->details,
                    'image'  => $fileURL
                ]
            );
            DB::commit();
            return response()->json(['gifts' => $Gift], 201);
            // return redirect()->route('admin.gifts',['id' => $campaignId])->with('success', 'Gift created successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            // Log::error('Error while Creating or updating a gift: ' . $e->getMessage());
            // return redirect()->back()->with('error','Failed to create Gift. ' . $e->getMessage());
            return response()->json(['error' => 'Failed!.', 'messages' => $e->getMessage()], 500);
        }
    }


    public function getSinglegiftData(Request $request){
        try {
            $giftId = $request->input('giftId');
            $Gift = CampaignGifts::where('id', $giftId)->firstOrFail();
            return response()->json([
                'gift' => $Gift
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    /**
     * Remove the specified resource from storage.
     */


    public function destroy($giftId)
    {
        $gift = CampaignGifts::findOrFail($giftId);
        $gift->delete(); 
        return redirect()->back()->with('success', 'Gift deleted successfully.');
    }
}
