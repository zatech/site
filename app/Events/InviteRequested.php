<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class InviteRequested
{
    use Dispatchable;

    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}
