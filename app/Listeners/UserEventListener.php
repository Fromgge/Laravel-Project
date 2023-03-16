<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class UserEventListener
{
    protected $instances = ['cart', 'wishlist'];

    public function handleLogin($event)
    {
        collect($this->instances)->each(function ($instance) use ($event) {
            Cart::instance($instance)->restore($event->user->id);
        });
    }

    public function handleLogout($event)
    {
        foreach ($this->instances as $instance) {
            if (Cart::instance($instance)->count() > 0) {
                Cart::instance($instance)->store($event->user->id);
            }
        }
    }

    public function subscribe($events)
    {
        $events->listen(
            Login::class,
            [UserEventListener::class, 'handleLogin']
        );

        $events->listen(
            Logout::class,
            [UserEventListener::class, 'handleLogout']
        );
    }
}
