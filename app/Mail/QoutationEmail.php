<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QoutationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'bookings@chinchingenterprises.com';
        $name = 'Archie Yongco';
        $subject = 'Booking Qoutation Approval';
        return $this->from($address, $name)
        ->view('mail.qoutationemail')
        ->subject($subject);
    }
}
