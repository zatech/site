<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class EmojiChanged
{
    use Dispatchable;

    public $payload;

    public function __construct(object $payload)
    {
        $this->payload = $payload;
    }
}
