<?php

namespace App\Listeners;

use App\Events\InstagramProfileCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreImagesCommandExecuted
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
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(InstagramProfileCreated $event)
    {
        \Artisan::call('images:store', [
            'profile_id' => $event->instagramProfile['profile_id'],
        ]);
    }
}
