<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

use Illuminate\Contracts\Queue\ShouldQueue;

class VolunteerNotification extends Mailable
{
    use Queueable, SerializesModels, SendGrid;

    public $volunteer;

    /**
     * Create a new message instance.
     *
     * @param $volunteer
     */
    public function __construct($volunteer)
    {
        $this->volunteer = $volunteer;
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
                        ['email' => $this->volunteer->email_id, 'name' => $this->volunteer->first_name . ' ' . $this->volunteer->last_name]
                    ]

                ],
            ],
            'categories' => ['donation_thank_you'],
        ]);

        return $this->subject('Volunteer registration')
            ->view('emails.volunteer-notification')
            ->with('volunteer', $this->volunteer);
    }
}
