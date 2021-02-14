<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;


  public $mailText;
  public $user;

  public function __construct($mailText, $user)
  {
    $this -> mailText = $mailText;
    $this -> user = $user;

  }

  public function build()
  {
      return $this->from('LaravelMail@email.it')
                  ->subject("Benvenuto " . $this -> user)
                  ->view('mails.welcome');
  }
}
