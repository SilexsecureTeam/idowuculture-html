<?php
// app/Mail/NewsletterBroadcast.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterBroadcast extends Mailable
{
    use Queueable, SerializesModels;

    public string $body;

    public function __construct(public string $subject, string $body)
    {
        $this->body = $body;
    }

    public function build(): static
    {
        return $this->subject($this->subject)
                    ->view('emails.newsletter'); // blade template
    }
}
