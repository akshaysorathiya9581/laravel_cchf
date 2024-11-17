<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
class EmailTemplateController extends Controller
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
    public function show(EmailTemplate $emailTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailTemplate $emailTemplate)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'campaign_id'  => 'required|numeric',
            'before_donation_details' => 'required|string',
            'after_donation_details' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $campaignId = $request->campaign_id;
                $EmailTemplate = EmailTemplate::updateOrCreate(
                ['campaign_id' => $campaignId],
                [
                    // 'campaign_id'  => $request->campaign_id,
                    'before_donation_details' => $request->before_donation_details,
                    'after_donation_details' => $request->after_donation_details
                ]
            );

            DB::commit();

            return redirect()->back()->with('success', 'Email Template Updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error while update email template: ' . $e->getMessage());
            return redirect()->back()->with('error','Failed to update. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        //
    }
}
