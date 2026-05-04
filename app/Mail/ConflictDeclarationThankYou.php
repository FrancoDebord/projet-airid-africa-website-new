<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConflictDeclarationThankYou extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Données du formulaire de déclaration COI.
     *
     * @var array<string, mixed>
     */
    public array $formData;

    /**
     * Numéro de référence de la déclaration (ex: COI-001).
     */
    public string $refNo;

    public function __construct(array $formData, string $refNo)
    {
        $this->formData = $formData;
        $this->refNo = $refNo;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'AIRID – Confirmation de votre déclaration de conflit d’intérêts (' . $this->refNo . ')',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.conflict_declaration_thank_you',
        );
    }
}
