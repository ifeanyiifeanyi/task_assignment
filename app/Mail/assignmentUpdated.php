<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
//use Illuminate\Mail\Mailables\Content;
//use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AssignmentUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $task;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $task)
    {
        $this->user = $user;
        $this->task = $task;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Assignment Updated')->markdown('emails.assignment_updated');

    }
}
