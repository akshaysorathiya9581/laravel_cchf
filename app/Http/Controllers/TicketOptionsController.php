<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use App\Models\Prizes;
use App\Models\GrandPrizes;
use App\Models\TicketOptions;
use App\Models\TicketOptionsPrizes;
use Illuminate\Http\Request;
use App\Models\Seasons;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Exception;

class TicketOptionsController extends Controller
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
            'admin.ticket_options.ticket_options',
            [
                'ticket_options' => TicketOptions::where('campaign_id', 0)->get(),
                'coupons' => Coupons::all(),
                'prizes' => Prizes::all(),
                'grand_prizes' => GrandPrizes::all(),
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
    public function show(TicketOptions $ticketOptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketOptions $ticketOptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketOptions $ticketOptions)
    {


        //    print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'price' => 'required|numeric',
            'entries' => 'required|numeric',
            'grand_prize' => 'nullable|numeric',
            'content' => 'nullable|string',
            'prizes_id' => 'nullable|array',
            'campaign_id' => 'nullable|numeric',
            'season_id' => 'required|numeric',
            'coupon_id' => 'nullable|string',
            'old_image' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {
            $campaign_id = isset($request->campaign_id) ? $request->campaign_id : 0;


            $TicketId = $request->input('ticketOptionId') ?? null;
            $fileUrl = $request->hasFile('image') ? $this->fileUploadService->uploadFile($request, 'image', 'ticket_options_prizes') : $request->input('old_image');

            $TicketOptions = TicketOptions::updateOrCreate(
                ['id' => $TicketId],
                [
                    'title'  => $request->title,
                    'campaign_id'  => $campaign_id,
                    'price' => $request->price,
                    'entries' => $request->entries,
                    'grand_prize' => $request->grand_prize,
                    'coupon_id' => $request->coupon_id,
                    'content' => $request->content,
                    'season_id' => $request->season_id,
                    'icon' => $fileUrl
                ]
            );
            $prizes_ids = $request->input('prizes_id', []);

            $TicketOptionsId =  $TicketOptions->id;
            TicketOptionsPrizes::where('ticket_option_id', $TicketOptionsId)->delete();
            $TicketOptionsPrizes = '';
            foreach ($prizes_ids as $prize_id) {
                $TicketOptionsPrizes =  TicketOptionsPrizes::create(
                    [
                        'campaign_id' => $campaign_id,
                        'prize_id' => $prize_id,
                        'ticket_option_id' => $TicketOptionsId
                    ]
                );
            }
            DB::commit();

            return response()->json(['TicketOptions' => $TicketOptions, 'TicketOptionsPrizes' => $TicketOptionsPrizes], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
        }
    }
    public function getTicketOptionSingledata(Request $request)
    {
        try {
            $ticketOptionId = $request->input('ticketOptionId');
            $ticketOptions = TicketOptions::where('id', $ticketOptionId)->first();
            $ticketOptionsPrizes = TicketOptionsPrizes::where('ticket_option_id', $ticketOptionId)->get();
            $prizes = Prizes::select('id', 'name')->get();
            $coupons = Coupons::select('id', 'title')->get();
            $grandPrizes = GrandPrizes::select('id', 'title')->get();

            return response()->json([
                'ticket_options' => $ticketOptions,
                'ticket_options_prizes' => $ticketOptionsPrizes,
                'coupons' => $coupons,
                'prizes' => $prizes,
                'grand_prizes' => $grandPrizes,
                'seasons' => Seasons::all()
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ticketId)
    {
        $ticketOption = TicketOptions::findOrFail($ticketId);
        $ticketOption->delete(); 
        return redirect()->back()->with('success', 'Ticket deleted successfully.');
    }
}
