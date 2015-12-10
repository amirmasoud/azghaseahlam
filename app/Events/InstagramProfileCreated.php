<?php

namespace App\Events;

use App\Events\Event;
use App\InstagramProfile;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class InstagramProfileCreated extends Event
{
    use SerializesModels;

    /**
     * instance of Instagram Profile
     * @var App/InstagramProfile
     */
    public $instagramProfile;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(InstagramProfile $instagramProfile)
    {
        $this->instagramProfile = $instagramProfile;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
