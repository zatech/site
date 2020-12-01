<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class InviteRequested
{
    use Dispatchable;

    public string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}
