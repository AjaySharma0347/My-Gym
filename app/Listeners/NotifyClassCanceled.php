<?php

namespace App\Listeners;

use App\Events\ClassCanceled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyClassCanceled
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
    public function handle(ClassCanceled $event): void
    {
        $scheduledClass = $event->scheduledClass;
        logger($scheduledClass);
    }
}
