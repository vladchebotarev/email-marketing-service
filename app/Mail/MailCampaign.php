<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailCampaign extends Mailable
{
    use Queueable, SerializesModels;

    protected $email_object;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_object)
    {
        $this->email_object = $email_object;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->email_object->from_email, $this->email_object->from_name)
            ->subject($this->email_object->subject)
            ->html($this->email_object->template)
            ->withSwiftMessage(function ($message) {
                $message->getHeaders()
                    ->addTextHeader('Campaign-ID', $this->email_object->id);
            });
    }
}
