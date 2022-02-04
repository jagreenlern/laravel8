<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;
    private $name;

    // ...
    public function __construct($name)
    {
        $this->name = $name;
    }

    // ...
    public function build()
    {
        return $this->from('dinocajic@gmail.com')
                    ->subject('Pure Randomness')
                    ->view('emailme', ['name' => $this->name]);
    }
}