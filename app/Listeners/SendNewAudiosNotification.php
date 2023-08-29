<?php

namespace App\Listeners;

use App\Events\AudiosProcessed;
use App\Mail\NewAudios;
use Illuminate\Support\Facades\Mail;

class SendNewAudiosNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AudiosProcessed $event): void
    {
        Mail::to(env('APP_MAIL_NOTIFICATION'))->send(
            new NewAudios($event->processed, $event->errors)
        );
    }
}
