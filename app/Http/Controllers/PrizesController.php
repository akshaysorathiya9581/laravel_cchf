<?php

namespace App\Http\Controllers;

use App\Models\Prizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Seasons;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;
class PrizesController extends Controller
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
            'admin.prizes.prizes',
            [
                'prizes' => Prizes::all(),
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
    public function show(Prizes $prizes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prizes $prizes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prizes $prizes)
    {
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string',
            'draw_date' => 'required|date',
            'image' => 'nullable|image',
            'season_id' => 'required|numeric',
            'old_image' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {

            $PrizeId = $request->input('PrizeId') ?? null;

            $fileUrl = $request->hasFile('image')
                ? $this->fileUploadService->uploadFile($request, 'image', 'prizes'): $request->input('old_image');
                $fileURL = $fileUrl ?? "  ";
                $Prizes = Prizes::updateOrCreate(
                ['id' => $PrizeId],
                [
                    'name'  => $request->name,
                    'draw_date' => $request->draw_date,
                    'image' => $fileURL,
                    'season_id' => $request->season_id
                ]
            );
            DB::commit();

            return response()->json(['Prizes' => $Prizes], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update.', 'messages' => $e->getMessage()], 500);
        }
    }
public function getPrizeSingledata(Request $request){
    try {
        $PrizeId = $request->input('PrizeId');
        $Prize = Prizes::where('id', $PrizeId)->firstOrFail();
        return response()->json([
            'prize' => $Prize,
            'seasons' => Seasons::all()
        ], 201);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prizeId)
    {
        $Prize = Prizes::findOrFail($prizeId);
        $Prize->delete(); 
        return redirect()->back()->with('success', 'Prize deleted successfully.');
    }
}
