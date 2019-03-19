<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingEmail extends Mailable
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
        //return $this->view('view.name');
        $address = 'bookings@chinchingenterprises.com';
        $name = 'Archie Yongco';
        $subject = 'Ching Ching Enterprises Booking Confirmation';
        return $this->from($address, $name)
        ->view('mail.bookingemail')
        ->subject($subject);
    }
}
