<?php

namespace App\Providers;

use App\Events\UserLoggedIn;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\LoginLog;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */

//    protected $listen = [
//        UserLoggedIn::class => [
//           LogUserLogin::class,
//        ],
//    ];


    /**
     * Register any events for your application.
     */
//    public function boot(): void
//    {
//        Event::listen(Login::class, function ($event) {
//            UserLoggedIn::dispatch($event->user);
//        });
//    }
    public function boot(): void
    {
        Event::listen(Login::class, function ($event) {
            // Voeg een nieuwe record toe aan de login_logs tabel
            LoginLog::create([
                'user_id' => $event->user->id,
            ]);
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
