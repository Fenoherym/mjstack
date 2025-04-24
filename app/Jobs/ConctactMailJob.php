<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class ConctactMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $name, public string $email, public string $message)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('fenoherysaiyan@gmail.com')
        ->send(new ContactMail(
            $this->name, 
            $this->email, 
            $this->message
        ));
    }
}
