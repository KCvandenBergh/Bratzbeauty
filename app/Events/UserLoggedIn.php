<?php

namespace App\Events;
use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserLoggedIn
{
    use Dispatchable, SerializesModels;

    /**
     *
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $user;
    }
}
