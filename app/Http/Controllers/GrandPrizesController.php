<?php

namespace App\Http\Controllers;

use App\Models\GrandPrizes;
use App\Models\Seasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;

class GrandPrizesController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.grand_prizes.grand_prizes',
            [
                'grand_prizes' => GrandPrizes::all(),
                'seasons' => Seasons::all()
            ],
        );
    }

    public function update(Request $request, GrandPrizes $grand_prizes)
    {
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'amount' => 'required|numeric',
            'season_id' => 'required|numeric',
            'image' => 'nullable|image',
            'old_image' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {

            $grandPrizeId = $request->input('grandPrizeId') ?? null;

            $fileUrl = $request->hasFile('image')
                ? $this->fileUploadService->uploadFile($request, 'image', 'grand_prizes')
                : $request->input('old_image');
            $GrandPrizes = GrandPrizes::updateOrCreate(
                ['id' => $grandPrizeId],
                [
                    'title'  => $request->title,
                    'amount' => $request->amount,
                    'image' => $fileUrl,
                    'season_id' => $request->season_id
                ]
            );
            DB::commit();

            return response()->json(['GrandPrizes' => $GrandPrizes], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
  public function getgrandPrizeSingledata(Request $request){
    try {
        $grandPrizeId = $request->input('grandPrizeId');
        $grandPrize = GrandPrizes::where('id', $grandPrizeId)->firstOrFail();
        return response()->json([
            'grandPrize' => $grandPrize,
            'seasons' => Seasons::all()
        ], 201);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
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
    public function show(GrandPrizes $grandPrizes)
    {
        //____
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrandPrizes $grandPrizes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($grandPrizeId)
    {
        $grandPrize = GrandPrizes::findOrFail($grandPrizeId);
        $grandPrize->delete(); 
        return redirect()->back()->with('success', 'Grand Prize deleted successfully.');
    }
}
