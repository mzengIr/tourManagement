<?php

namespace App\Listeners;

use App\Events\UserRegisteredInTour;
use App\Mail\RegisteredConfirm;
use App\Mail\UserInformationRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailUserRegisteredInTour
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegisteredInTour  $event
     * @return void
     */
    public function handle(UserRegisteredInTour $event)
    {
        Mail::to($event->getUser()->email)
            ->send(new RegisteredConfirm($event->getUser()));

        Mail::to($event->getTour()->admin->email)
            ->send(new UserInformationRegistered($event->getUser(),$event->getTour(),$event->getTourPrice()));

    }
}
