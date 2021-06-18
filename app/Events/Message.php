<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class Message
{
    use Dispatchable;

    public string $payload;

    public function __construct(object $payload)
    {
        $this->payload = $payload;
    }
}
