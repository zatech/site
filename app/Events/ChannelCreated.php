<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ChannelCreated
{
    use Dispatchable, SerializesModels;

    public object $payload;

    public function __construct(object $payload)
    {
        $this->payload = $payload;
    }
}
