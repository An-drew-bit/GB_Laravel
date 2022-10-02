<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(protected $formData)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ContactForm
    {
        return $this->view('auth.email.contact')->with([
            'formData' => $this->formData
        ]);
    }
}
