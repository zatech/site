<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class TeamJoin
{
    use Dispatchable;

    public object $payload;

    public function __construct(object $payload)
    {
        $this->payload = $payload;
    }
}
