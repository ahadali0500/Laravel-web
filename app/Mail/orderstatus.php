<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class orderstatus extends Mailable
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
return $this->subject('Order Notification')
->view('mail.orderstatus',$mailData);
}
}