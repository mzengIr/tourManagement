<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserInformationRegistered extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $tour;
    private $tourPrice;

    public function __construct($user,$tour,$tourPrice)
    {
        $this->user = $user;
        $this->tour = $tour;
        $this->tourPrice = $tourPrice;
    }

    public function build()
    {
        return $this->from($this->tour->admin->email)
            ->subject('Registered Confirm')
            ->view('layouts/UserInformationMail')
            ->with('user',$this->user)->with('tour', $this->tour)->with('tour_price' , $this->tourPrice);
    }
}
