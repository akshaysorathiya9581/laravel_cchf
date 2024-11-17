<?php

namespace App\Http\Controllers;

use App\Models\CampaignGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;

class CampaignGalleryController extends Controller
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
    public function show(CampaignGallery $campaignGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampaignGallery $campaignGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignGallery $campaignGallery)
    {
       //   print_r($request->all());die;
       $validator = Validator::make($request->all(), [
        'campaign_id'  => 'required|numeric',
        'title'  => 'required|string',
        'embed'  => 'nullable|string',
        'image' => 'nullable|image',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
    }

    DB::beginTransaction();

    try {

        $gallery_id = $request->input('galleryId') ?? null;

        $fileUrl = $request->hasFile('image') ? $this->fileUploadService->uploadFile($request, 'image', 'gallery') : $request->input('old_image');
        $gallery = CampaignGallery::updateOrCreate(
            ['id' => $gallery_id],
            [
                'campaign_id' => $request->campaign_id,
                'title'  => $request->title,
                'embed' => $request->embed,
                'image' => $fileUrl
            ]
        );
        DB::commit();

        return response()->json(['gallery' => $gallery], 201);
    } catch (Exception $e) {
        DB::rollBack();
        return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
    }
    }

    public function getSingleGallery(Request $request){
        try {
            $galleryId = $request->input('galleryId');
            $gallery = CampaignGallery::where('id', $galleryId)->firstOrFail();
            return response()->json([
                'gallery' => $gallery
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($galleryId)
    {
        $gallery = CampaignGallery::findOrFail($galleryId);
        $gallery->delete(); 
        return redirect()->back()->with('success', 'Gallery deleted successfully.');
    }
}
