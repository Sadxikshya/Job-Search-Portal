<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmployerJobAppliedMail extends Mailable implements ShouldQueue

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
            subject: 'Employer Job Applied Mail',
        );
    }
    
    public function build()
    {
        return $this->subject('New Job Application Received')
            ->markdown('emails.employer.job_applied');
    }
    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'emails.employer.job_applied',
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
