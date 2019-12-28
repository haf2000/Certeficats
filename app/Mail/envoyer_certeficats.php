<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class envoyer_certeficats extends Mailable
{
    use Queueable, SerializesModels;

     public $data;

    public function __construct($data)
    {
             $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
     return $this->from('hh_bouzaouia@esi.dz')->subject('Certificat')->view('Mails.envoyer_certeficats_text')->with('data',$this->data) ->attach($this->data['path']);
    }
    
}
