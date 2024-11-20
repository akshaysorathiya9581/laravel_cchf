<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampaignOpenGraph;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;

class OpenGraphController extends Controller
{

    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function getOgDetail(Request $request) {

        $data['og_properties'] = CampaignOpenGraph::where('page', $request->page)->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'og_title' => 'required|string|max:255',
            'og_description' => 'required|string|max:555',
        ]);

        $imageUrl = $request->hasFile('og_image') ? $this->fileUploadService->uploadFile($request, 'og_image', 'og'): $request->input('old_og_image');

        CampaignOpenGraph::updateOrCreate(
            ['page' => $request->og_page],
            [
                'og_title'  => $request->og_title,
                'campaign_id'  => $request->campaign_id,
                'og_image'  => $imageUrl,
                'og_description'  => $request->og_description,
                'page'  => $request->og_page
            ]
        );

        return response()->json([
            'success' => true,
            'data' => array(),
            'message' => 'Open Graph data updated successfully.'
        ]);
    }
}
