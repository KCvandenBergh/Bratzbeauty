<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Support\Facades\Log;

class LogUserLogin
{
    /**
     * Handle the event.
     */
    public function handle(UserLoggedIn $event): void
    {
        // Registreer de login in een logbestand
        Log::info('User logged in:', ['user_id' => $event->user->id]);

    }
}
