<?php

namespace App\Mail;
use Log;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

     protected $notice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {                 
        $this->id = $id;        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.mail-form')
                    ->with([                                           
                        'id' => $this->id                
                    ]);
    }
}
