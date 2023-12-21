<?php

namespace App\Listeners;

use App\Events\DelayedLetterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\delayLetterWarningNotification;

class SendDelayAlertNotification
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
     * @param  \App\Events\DelayedLetterEvent  $event
     * @return void
     */
    public function handle(DelayedLetterEvent $event)
    {
        $letter = $event->letter;
        $managerEmails = $event->managerEmails;
        $currentNode = $event->currentNode;


               Notification::route('mail', $managerEmails)->notify(new delayLetterWarningNotification($letter, $currentNode));

            Log::info('DelayedLetterEvent listener executed.');
    }
}
