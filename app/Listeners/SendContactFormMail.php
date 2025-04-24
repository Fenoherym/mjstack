<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use App\Jobs\ConctactMailJob;
use App\Mail\ContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactFormMail
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
    public function handle(ContactFormSubmitted $event): void
    {
        ConctactMailJob::dispatch(
            $event->name,
            $event->email,
            $event->message
        );
    }
}
