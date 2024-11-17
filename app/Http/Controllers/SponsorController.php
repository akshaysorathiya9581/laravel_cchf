<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Models\campaign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Illuminate\Support\Facades\Log;
use Exception;

class SponsorController extends Controller
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
            'admin.sponsor.sponsor',
            [
                'sponsors' =>  Sponsor::where('campaign_id',$id)->get(),
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
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $campaignId = $request->input('campaign_id');
        $sponsorID = $request->input('sponsorID') ?? null;
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'image' => 'nullable|image',
            'old_image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect('campaign/sponsor/' . $campaignId)
                ->withErrors($validator)
                ->withInput();
        }
        // if ($validator->fails()) {
        //     return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        // }
        DB::beginTransaction();

        try {
            $fileUrl = $request->hasFile('image')
            ? $this->fileUploadService->uploadFile($request, 'image', 'sponsor'): $request->input('old_image');
            $fileURL = $fileUrl ?? " ";
            $Sponsor = Sponsor::updateOrCreate(
                ['id' => $sponsorID],
                [
                    'campaign_id'  => $request->campaign_id,
                    'title'  => $request->title,
                    'image'  => $fileURL
                ]
            );
            DB::commit();
            // return response()->json(['gifts' => $Gift], 201);
            return redirect()->route('admin.sponsor',['id' => $campaignId])->with('success', 'Sponsor created successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            // Log::error('Error while Creating or updating a gift: ' . $e->getMessage());
            return redirect()->back()->with('error','Failed to create sponsor. ' . $e->getMessage());
            // return response()->json(['error' => 'Failed!.', 'messages' => $e->getMessage()], 500);
        }
    }
    public function getSingleSponsorData(Request $request){
        try {
            $sponsorID = $request->input('sponsorID');
            $Sponsor = Sponsor::where('id', $sponsorID)->firstOrFail();
            return response()->json([
                'sponsor' => $Sponsor
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sponsorID)
    {
        $gift = Sponsor::findOrFail($sponsorID);
        $gift->delete();
        return redirect()->back()->with('success', 'Sponsor deleted successfully.');
    }
}
