<?php

namespace App\Http\Controllers;

use App\Models\EarlyBird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Models\Seasons;
use App\Exceptions\FileUploadException;
use Exception;

class EarlyBirdController extends Controller
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
        return view('admin.early_bird.early_bird',[
              'EarlyBird' => EarlyBird::all(),
              'seasons' => Seasons::all()
        ]);
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
    public function show(EarlyBird $earlyBird)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EarlyBird $earlyBird)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EarlyBird $earlyBird)
    {
        //   print_r($request->all());die;
          $validator = Validator::make($request->all(), [
            'start_date'  => 'nullable|date',
            'end_date'  => 'required|date',
            'season_id' => 'required|numeric',
            'image' => 'nullable|image',
            'old_image' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }
        DB::beginTransaction();
        try {
            $EarlyBirdId = $request->input('EarlyBirdId') ?? null;
            $fileURL = $request->hasFile('image') ? $this->fileUploadService->uploadFile($request, 'image', 'early_bird') : $request->input('old_image');
            $fileUrl = $fileURL ?? " ";
            $EarlyBird = EarlyBird::updateOrCreate(
                ['id' => $EarlyBirdId],
                [
                    'start_date'  => $request->start_date,
                    'end_date' => $request->end_date,
                    'image' => $fileUrl,
                    'season_id' => $request->season_id
                ]
            );
            DB::commit();
            return response()->json(['EarlyBird' => $EarlyBird], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
        }
    }
    public function getSingleEarlyBird(Request $request){
        try {
            $EarlyBirdId = $request->input('earlyBirdId');
            $EarlyBird = EarlyBird::where('id', $EarlyBirdId)->firstOrFail();
            return response()->json([
                'EarlyBird' => $EarlyBird,
                'seasons' => Seasons::all()
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($earlyBirdId)
    {
        $earlyBird = EarlyBird::findOrFail($earlyBirdId);
        $earlyBird->delete(); 
        return redirect()->back()->with('success', 'Early Bird deleted successfully.');
    }
}
