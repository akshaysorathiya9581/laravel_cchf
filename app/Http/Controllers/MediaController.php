<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Seasons;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class MediaController extends Controller
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
        return view (
            'admin.media.index',
            [
                'media' => Media::all(),
                'seasons' => Seasons::all()
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'season_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {

            $errors = $validator->errors()->toArray();
            return response()->json([
                'success' => false,
                'errors' =>  $errors
            ]);
        }

        DB::beginTransaction();

        try {

            $slug = generateSlug($request->title);

            $mediaId = $request->input('mediaId') ?? null;
            $fileUrl = $request->hasFile('image') ? $this->fileUploadService->uploadFile($request, 'image', 'media'): $request->input('old_image');
            $fileURL = $fileUrl ?? " ";

            $media = Media::updateOrCreate (

                ['id' => $mediaId],

                [
                    'title'  => $request->title,
                    'video_link'  => $request->video_link,
                    'publish_date'  => $request->publish_date,
                    'author'  => $request->author,
                    'image' => $fileURL,
                    'description' => $request->description,
                    'user_id' => $request->user_id,
                    'season_id' => $request->season_id
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Media '.(isset($mediaId) ? 'Updated' : 'Created').' successfully'
            ]);

        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Error while Creating or updating a media: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getMediaDetail(Request $request){

        try {

            $mediaId = $request->input('mediaId');
            $media = Media::where('id', $mediaId)->firstOrFail();

            return response()->json([
                'media' => $media,
            ], 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mediaId)
    {
        $media = Media::findOrFail($mediaId);
        $media->delete(); 
        return redirect()->back()->with('success', 'Media deleted successfully.');
    }

    /**
	 * Media view page
	 */
	public function view(Request $request, $id)
	{

		$mediaInfo = Media::where('id', $id)->firstOrFail();  // Retrieves the media by slug

		$ogmeta = array(
			'og_title' => $mediaInfo->title,
			'og_description' => $mediaInfo->description,
			'og_image' => $mediaInfo->image
		);

		return view ('frontend.templates.masbia-template.media-detail', [
			'user' => $request->user(),
			'ogcustommeta' => $ogmeta,
			'media' => $mediaInfo
		]);
	}
}
