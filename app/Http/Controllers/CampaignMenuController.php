<?php

namespace App\Http\Controllers;

use App\Models\CampaignMenu;
use Illuminate\Http\Request;
use App\Models\campaign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class CampaignMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(CampaignMenu $campaignMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampaignMenu $campaignMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignMenu $campaignMenu)
    {
        $validator = Validator::make($request->all(), [
            'campaign_id' => 'required|numeric',
            'title' => 'required|string',
            'url' => 'required|string',
            'type' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }
        DB::beginTransaction();

        try {

            $menuId = $request->input('menuId') ?? null;
            DB::commit();
            $menu = CampaignMenu::updateOrCreate(
                [
                    'id' => $menuId
                ],
                [
                    'campaign_id' => $request->campaign_id,
                    'title' => $request->title,
                    'url' => $request->url,
                    'type' => $request->type,
                ]
            );

            return response()->json(['menu' => $menu], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed! : Error Occured.', 'message' => $e->getMessage()], 500);
        }
    }

    public function getMenuSingledata(Request $request){
        try {
            $menuId = $request->input('menuId');
            $Menu = CampaignMenu::where('id', $menuId)->firstOrFail();
            return response()->json([
                'menu' => $Menu
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    /*
    * Remove the specified resource from storage.
    */
   public function destroy($menuId)
   {
       $menu = CampaignMenu::findOrFail($menuId);
       $menu->delete(); 
       return redirect()->back()->with('success', 'Menu deleted successfully.');
   }
}
