<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobStatusUpdatedMail extends Mailable implements ShouldQueue

{
    use Queueable, SerializesModels;

    public $application;


    /**
     * Create a new message instance.
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Job Status Updated Mail',
        );
    }


    public function build()
    {
        return $this->subject($this->subjectLine())
            ->markdown('emails.jobseeker.status_updated');
    }

    protected function subjectLine(): string
    {
        return match ($this->application->status) {
            'accepted' => '🎉 Application Accepted!',
            'rejected' => 'Application Update',
            default => 'Application Status Updated',
        };
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'emails.jobseeker.status_updated',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
