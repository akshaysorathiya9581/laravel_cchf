<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\Blogs;

class VolunteerController extends Controller
{
	/**
	 * Volunteer Signup Page
	 */
	public function index(Request $request): View
	{

		$user = auth()->user();

		return view('frontend.templates.masbia-template.volunteer', [
			'user' => $request->user(),
			'page' => 'volunteer'
		]);
	}


    /**
     * Update/Insert volunteer role
     */
    public function update(Request $request, Blogs $blogs): JsonResponse
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

            $blogId = $request->input('blogId') ?? null;
            $fileUrl = $request->hasFile('image') ? $this->fileUploadService->uploadFile($request, 'image', 'blogs'): $request->input('old_image');
            $fileURL = $fileUrl ?? " ";
                $blog = Blogs::updateOrCreate(
                ['id' => $blogId],
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
          if(isset($blogId)){
            return response()->json([
                'success' => true,
                'message' => 'Blog updated successfully'
            ]);
          } else {
            return response()->json([
                'success' => true,
                'message' => 'Blog created successfully'
            ]);
          }
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Error while Creating or updating a blog: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
