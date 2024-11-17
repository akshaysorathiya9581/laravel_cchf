<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

use Illuminate\Contracts\Queue\ShouldQueue;

class ManagerNotification extends Mailable
{
    use Queueable, SerializesModels, SendGrid;

    public $donation;

    /**
     * Create a new message instance.
     *
     * @param $donation
     */
    public function __construct($donation)
    {
        $this->donation = $donation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->sendgrid([
            'personalizations' => [
                [
                    'to' => [
                        ['email' => $this->donation->donor_email, 'name' => $this->donation->donor_first_name . ' ' . $this->donation->donor_last_name]
                    ]

                ],
            ],
            'categories' => ['donation_thank_you'],
        ]);
        return $this->subject('New Donation Received')
            ->view('emails.manager-notification')
            ->with('donation', $this->donation);
    }
}
