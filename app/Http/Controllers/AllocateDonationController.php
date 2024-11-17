<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllocateDonation;
use Illuminate\Support\Facades\Validator;

class AllocateDonationController extends Controller
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
       try {
            $return['status'] = false;

            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 500);
            }

            if($request->edit_id != '') {
                $allocatedonation = AllocateDonation::where(['id' => $request->edit_id])->update(['name' => $request->name]);

                $return['status'] = true;
                $return['message'] = 'Update successfully!';
            } else {
                 $allocatedonation = AllocateDonation::create(['campaign_id' => $request->campaign_id, 'name' => $request->name]);

                if($allocatedonation) {                
                    $return['status'] = true;
                    $return['message'] = 'Add successfully!';
                }
            }
            return response()->json($return, 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $campaign = AllocateDonation::findOrFail($id);
        $campaign->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
