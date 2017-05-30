<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $phone, $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($phone, $message)
     {
         //
         $this->phone = $phone;
         $this->message = $message;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact-us');
    }
}
