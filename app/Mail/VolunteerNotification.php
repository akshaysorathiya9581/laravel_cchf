<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

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
                        ['email' => 'divyeshbhanderi066@gmail.com', 'name' => $this->volunteer->first_name . ' ' . $this->volunteer->last_name]
                    ]

                ],
            ],
            'categories' => ['volunteer_welcome'],
        ]);

        return $this->subject('Volunteer registration')
            ->view('emails.volunteer-notification')
            ->with('volunteer', $this->volunteer);
    }
}
