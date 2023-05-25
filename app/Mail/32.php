<?php

namespace App\Mail\mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class forgotpassword extends Mailable
{
    use Queueable, SerializesModels;
 public $mailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
         $this->mailData = $mailData;
    }

      public function build()
      {
      $mailData = $this->mailData;
      return $this->subject('Forgot Password')
      ->view('mail.forgotpassword',$mailData);
      }
}