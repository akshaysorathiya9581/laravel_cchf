<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\DonorNotification;
use App\Mail\TestEmail;
use App\Models\EmailApiSettings;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;


class TestEmailController extends Controller
{
    public function sendTestEmail()
    {
        setSendgridApiKey();
        try {
            $donation = (object) [
                'donor_email' => env('TEST_EMAIL'),
                'donor_first_name' => 'Test Donor',
                'donor_last_name' => 'Test Donor',
                'amount' => 100,
            ];
            // Mail::mailer('sendgrid')->to($donation->donor_email)->send(new DonorNotification($donation)); 
            Mail::to($donation->donor_email)->send(new TestEmail($donation));
            return response()->json(['success' => 'Test email sent successfully!'], 200);
        } catch (Exception $e) {
            Log::error('Email sending failed: ' .  $e->getMessage());
            return response()->json(['error' => 'Email sending failed: ' . $e->getMessage()], 500);
        }
    }
}
