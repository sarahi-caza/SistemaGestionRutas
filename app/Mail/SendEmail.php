<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $clave;
    public $recuperacion;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $clave, $recuperacion=false)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->recuperacion = $recuperacion;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notificación de Airway')
                    ->view('emails.claveUsuario');
    }
}