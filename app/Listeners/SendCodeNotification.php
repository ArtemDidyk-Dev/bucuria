<?php

namespace App\Listeners;

use App\Events\SendCode;
use App\Mail\CodeEmail;
use Illuminate\Support\Facades\Mail;

class SendCodeNotification
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
     * @param  \App\Events\SendCode  $event
     * @return void
     */
    public function handle(SendCode $event)
    {
        $user = $event->user;

        Mail::to($user->email)->send(new CodeEmail($user->code));
    }
}
