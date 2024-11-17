<?php

namespace App\Http\Controllers;

use App\Models\SponsorshipOpportunities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;
class SponsorshipOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }
    public function index()
    {
        //
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
    public function show(SponsorshipOpportunities $sponsorshipOpportunities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SponsorshipOpportunities $sponsorshipOpportunities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SponsorshipOpportunities $sponsorshipOpportunities)
    {
              //   print_r($request->all());die;
              $validator = Validator::make($request->all(), [
                'campaign_id'  => 'required|numeric',
                'title'  => 'required|string',
                'amount'  => 'required|numeric',
                'image' => 'nullable|image',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
            }

            DB::beginTransaction();

            try {

                $sponsorshipId = $request->input('sponsorshipId') ?? null;

                $fileURL = $request->hasFile('image') ? $this->fileUploadService->uploadFile($request, 'image', 'sponsorship_opportunities') : $request->input('old_image');
               $fileUrl = $fileURL ?? " ";
                $sponsorship = SponsorshipOpportunities::updateOrCreate(
                    ['id' => $sponsorshipId],
                    [
                        'campaign_id' => $request->campaign_id,
                        'title'  => $request->title,
                        'amount' => $request->amount,
                        'image' => $fileUrl
                    ]
                );
                DB::commit();

                return response()->json(['sponsorship' => $sponsorship], 201);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
            }
    }
  public function getSingleSponsorShipOpportunity(Request $request){
    try {
        $sponsorshipId = $request->input('sponsorshipId');
        $sponsorship = SponsorshipOpportunities::where('id', $sponsorshipId)->firstOrFail();
        return response()->json([
            'sponsorship' => $sponsorship
        ], 201);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
  }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sponsorShipId)
    {
        $sponsorShip = SponsorshipOpportunities::findOrFail($sponsorShipId);
        $sponsorShip->delete(); 
        return redirect()->back()->with('success', 'Sponsorship Opportunity deleted successfully.');
    }
}
