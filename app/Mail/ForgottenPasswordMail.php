<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgottenPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    function __construct($token)
    {
        $this->token = $token;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Forgotten Password Mail',
        );
    }

    public function content()
    {
        return new Content(
            view: 'admin.emails.forgotten-password',
        );
    }

    public function attachments()
    {
        return [];
    }
}
