<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Seasons;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class BlogsController extends Controller
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
        return view(
            'admin.blogs.blogs',
            [
                'blogs' => Blogs::all(),
                'seasons' => Seasons::all()
            ],
        );
    }

    /**
     * Update the specified resource in storage.
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

    public function getSingleBlog(Request $request){
        try {
            $blogId = $request->input('blogId');
            $blog = Blogs::where('id', $blogId)->firstOrFail();
            return response()->json([
                'blog' => $blog,
                'seasons' => Seasons::all()
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($blogId)
    {
        $Blog = Blogs::findOrFail($blogId);
        $Blog->delete(); 
        return redirect()->back()->with('success', 'Blog deleted successfully.');
    }
}
