<?php

namespace App\Listeners;

use App\Events\MessageDeleted;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyMessageDeleted implements ShouldQueue
{
    public function handle(MessageDeleted $event)
    {
        $message = sprintf(
            'Message was deleted in <#%s>',
            $event->payload->channel,
        );

        Messenger::send(config('services.slack.message_delete_chanid'), $message, ':candle:');
    }
}
