<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EmailTemplates;

class EmailTemplatesController extends Controller
{
    public function index(Request $request) {

        $campaign_id = $request->id;
        return view ('admin.email.thankyou',['campaign_id' => $campaign_id]);
    }

    /**
     * Update the email template.
     */
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'mail_subject'  => 'required|string',
            'email_message' => 'required|string',
        ]);

        if ($validator->fails()) {

            $errors = $validator->errors()->toArray();
            return response()->json([
                'success' => false,
                'errors' =>  $errors
            ]);
        } else {

            EmailTemplates::updateOrCreate (
                ['page' => $request->page],
                [
                    'campaign_id'  => $request->campaign_id,
                    'page'  => $request->mail_page,
                    'admin_emails'  => $request->admin_emails,
                    'subject'  => $request->mail_subject,
                    'message'  => $request->email_message
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Email template updated successfully'
            ]);
        }
    }

    public function getEmailSetting(Request $request) {

        $page = $request->page;
        $campaign_id = $request->campaign_id;

        $emailTemplate = EmailTemplates::where('campaign_id', $campaign_id)
            ->where('page', $page)
            ->first();

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $emailTemplate
        ]);
    }
}
