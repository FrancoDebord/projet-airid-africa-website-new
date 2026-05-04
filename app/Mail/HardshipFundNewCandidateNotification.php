<?php

namespace App\Mail;

use App\Models\HardshipFundApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HardshipFundNewCandidateNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public HardshipFundApplication $application
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'AIRID – New application Hardship Fund (Women in STEM) – ' . $this->application->full_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.hardship_fund_new_candidate_notification',
        );
    }

    /**
     * Pièces jointes : tous les documents déposés par le candidat.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        $basePath = public_path('assets/hardship_fund');
        $files = [
            'proof_enrolment_path' => 'Preuve_inscription',
            'transcript_path' => 'Transcript',
            'support_letter_path' => 'Lettre_soutien',
            'id_document_path' => 'Piece_identite',
            'personal_statement_file_path' => 'Lettre_motivation',
            'signature_path' => 'Signature',
        ];
        foreach ($files as $column => $label) {
            $path = $this->application->$column;
            if ($path && is_string($path) && file_exists($basePath . '/' . $path)) {
                $ext = pathinfo($path, PATHINFO_EXTENSION) ?: 'bin';
                $attachments[] = Attachment::fromPath($basePath . '/' . $path)
                    ->as($label . '_' . $this->application->id . '.' . $ext);
            }
        }
        return $attachments;
    }
}
