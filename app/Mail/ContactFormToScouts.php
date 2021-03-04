<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormToScouts extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_form;
    
    public function __construct($contact_form)
    {
        $this->contact_form = $contact_form;
    }

    public function build()
    {
        $subject = 'De website: ' . $this->contact_form->naam . ' stelde ons een vraag.';

        return $this
            ->to('fos207ste@gmail.com')
            ->subject($subject)
            ->view('mails.contact', [
                'subject' => $subject,
                'contact_form' => $this->contact_form,
            ])
            ->text('mails.contact_plain', [
                'contact_form' => $this->contact_form,
            ]);
    }
}
