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
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogs $blogs)
    {
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'image' => 'nullable|image',
            'description' => 'required|string',
            'season_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'old_image' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        DB::beginTransaction();
        try {
            $slug = str_replace(' ', '-', $request->title);
            $blogId = $request->input('blogId') ?? null;
            $fileUrl = $request->hasFile('image') ? $this->fileUploadService->uploadFile($request, 'image', 'blogs'): $request->input('old_image');
            $fileURL = $fileUrl ?? " ";
                $blog = Blogs::updateOrCreate(
                ['id' => $blogId],
                [
                    'title'  => $request->title,
                    'slug'  => $slug,
                    'image' => $fileURL,
                    'description' => $request->description,
                    'user_id' => $request->user_id,
                    'season_id' => $request->season_id
                ]
            );
            DB::commit();
          if(isset($blogId)){
              return redirect()->route('admin.blogs')->with('success', 'blogs updated successfully');
          }else{
              return redirect()->route('admin.blogs')->with('success', 'blogs created successfully');
          }
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Error while Creating or updating a blog: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create Blog. ' . $e->getMessage());
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
