<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InschrijvingFormToScouts extends Mailable
{
    use Queueable, SerializesModels;

    public $inschrijving_form;
    
    public function __construct($inschrijving_form)
    {
        $this->inschrijving_form = $inschrijving_form;
    }

    public function build()
    {
        $subject = 'Nieuwe inschrijving: ' . $this->inschrijving_form->voornaam . ' ' . $this->inschrijving_form->achternaam;

        return $this
            ->to('fos207ste@gmail.com')
            ->subject($subject)
            ->view('mails.inschrijving', [
                'subject' => $subject,
                'inschrijving_form' => $this->inschrijving_form,
            ])
            ->text('mails.contact_plain', [
                'inschrijving_form' => $this->inschrijving_form,
            ]);
    }
}
