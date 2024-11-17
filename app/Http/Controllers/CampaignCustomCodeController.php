<?php

namespace App\Http\Controllers;

use App\Models\CampaignCustomCode;
use Illuminate\Http\Request;
use App\Models\campaign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;
use Illuminate\Validation\Rules\Unique;

class CampaignCustomCodeController extends Controller
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
        $campaign = campaign::select('id', 'camp_title')->where('id', $id)->first();
        $code = CampaignCustomCode::where('campaign_id', $campaign->id)->first();
        return view(
            'admin.custom_code.custom_code',
            [
                'campaign' => $campaign,
                'code' => $code
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
    public function show(CampaignCustomCode $campaignCustomCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampaignCustomCode $campaignCustomCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignCustomCode $campaignCustomCode)
    {
        $validator = Validator::make($request->all(), [
            'content'  => 'required|string',
            'campaign_id'  => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {
            $campaign_id = $request->input('campaign_id');
            $filename = uniqid() . '.txt';
            $createFile = fopen($filename,'w');
            $file = fwrite($createFile,$request->content);
            $fileUrl = $this->fileUploadService->uploadFile($request, 'file', 'custom_code');
            $CampaignCustomCode = CampaignCustomCode::updateOrCreate(
                ['campaign_id' => $campaign_id],
                [
                    'content'  => $fileUrl,
                ]
            );
            DB::commit();

            return response()->json(['CampaignCustomCode' => $CampaignCustomCode], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CampaignCustomCode $campaignCustomCode)
    {
        //
    }
}
