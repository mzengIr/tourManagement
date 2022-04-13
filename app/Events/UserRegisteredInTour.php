<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegisteredInTour
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    private $tour;
    private $tourePrice;

    public function __construct($user,$tour,$tourPrice)
    {
        $this->user = $user;
        $this->tour = $tour;
        $this->tourePrice = $tourPrice;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getTour()
    {
        return $this->tour;
    }
    public function getTourPrice(){
        return $this->tourePrice;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
