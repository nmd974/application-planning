<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $purpose;

    public function __construct($data, $purpose)
    {
        $this->data = $data;
        $this->purpose = $purpose;
    }

    public function build()
    {
        $address = getenv("EMAIL_FROM");
        $subject = 'Vos prochains examens';
        if($this->purpose == "student"){
            return $this->view('emails.student')
            ->from($address)
            ->subject($subject)
            ->with([ 'token' => $this->data["token"], 'qr_code' => $this->data["qr_code"] ]);
        }else{
            return $this->view('emails.jury')
            ->from($address)
            ->subject($subject)
            ->with([ 'token' => $this->data ]);
        }

    }
}
