<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StaffPlatformsLoginNotification extends Mailable
{
    use Queueable, SerializesModels;

    public string $staffName;
    public string $staffEmail;
    public string $loginTime;
    public string $ipAddress;

    public function __construct(string $staffName, string $staffEmail, string $ipAddress)
    {
        $this->staffName  = $staffName;
        $this->staffEmail = $staffEmail;
        $this->loginTime  = now()->format('F j, Y \a\t H:i \(UTC\)');
        $this->ipAddress  = $ipAddress;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'AIRID Staff Platform – New Sign-In Detected',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.staff_platforms_login_notification',
        );
    }
}
