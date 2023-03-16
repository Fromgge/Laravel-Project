<?php

namespace App\Listeners\Orders;

use App\Events\OrderCreated;
use App\Jobs\OrderCreatedJob;
use App\Notifications\OrderCreatedNotification;
use App\Services\Contracts\InvoicesServiceContract;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatedListener
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
     * @param  \App\Events\OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        logs()->info(self::class);
//        logs()->info(app()->make(InvoicesServiceContract::class)->generate($event->order)->url());
        OrderCreatedJob::dispatch($event->order)->onQueue('emails'); //->delay(30);
//        OrderCreatedJob::dispatchSync($event->order); //->onQueue('emails'); //->delay(30);
    }
}
