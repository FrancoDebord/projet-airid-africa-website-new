<?php

namespace App\Mail;

use App\Models\HardshipFundApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HardshipFundAcknowledgement extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public HardshipFundApplication $application
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'AIRID – Accusé de réception de votre candidature (Hardship Fund for Women in STEM)',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.hardship_fund_acknowledgement',
        );
    }
}
