<?php

namespace App\Listeners;

use App\Events\SendLoyaltyCode;
use App\Mail\LoyaltyCodeEmail;
use Illuminate\Support\Facades\Mail;

class SendLoyaltyCodeNotification
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
     * @param  \App\Events\SendLoyaltyCode  $event
     * @return void
     */
    public function handle(SendLoyaltyCode $event)
    {
        $user = $event->user;

        Mail::to($user->email)->send(new LoyaltyCodeEmail($user->loyalty_code));
    }
}
