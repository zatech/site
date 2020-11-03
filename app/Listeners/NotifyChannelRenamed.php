<?php

namespace App\Listeners;

use App\Events\ChannelRenamed;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyChannelRenamed implements ShouldQueue
{
    public function handle(ChannelRenamed $event)
    {
        $message = sprintf(
            '<#%s> renamed to `%s`',
            $event->payload->channel->id,
            $event->payload->channel->name
        );

        Messenger::send(config('services.slack.channel_report_chanid'), $message, ':arrow_right:');
    }
}
