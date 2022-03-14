<?php

namespace sisVentasWeb\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WorkFinalized extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name,$email,$workid;

    public function __construct($name, $email, $workid)
    {
        $this->name = $name;
        $this->email = $email;
        $this->workid = $workid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.workfinalized');
    }
}
