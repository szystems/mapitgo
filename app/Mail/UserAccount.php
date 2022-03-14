<?php

namespace sisVentasWeb\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nombre,$email,$contrasena;

    public function __construct($nombre, $email, $contrasena)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contrasena = $contrasena;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cuentausuario');
    }
}
