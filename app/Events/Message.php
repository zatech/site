<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class Message
{
    use Dispatchable, SerializesModels;

    public $payload;

    public function __construct(object $payload)
    {
        $this->payload = $payload;
    }
}
