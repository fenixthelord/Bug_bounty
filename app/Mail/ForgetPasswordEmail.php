<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

<<<<<<< HEAD
class ForgetPasswordEmail extends Mailable {
=======
class ForgetPasswordEmail extends Mailable
{
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
    use Queueable, SerializesModels;


    public $subjectTitle;
    public $otp;
    public $description;

    /**
     * Create a new message instance.
     */
<<<<<<< HEAD
    public function __construct($subjectTitle, $otp, $description) {
=======
    public function __construct($subjectTitle, $otp, $description)
    {
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
        $this->subjectTitle = $subjectTitle;
        $this->otp = $otp;
        $this->description = $description;
    }

    /**
     * Get the message envelope.
     */
<<<<<<< HEAD
    public function envelope(): Envelope {
=======
    public function envelope(): Envelope
    {
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
        return new Envelope(
            subject: $this->subjectTitle,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.forgetPassword',
        );
    }

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
