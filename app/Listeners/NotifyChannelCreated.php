<?php

namespace App\Listeners;

use App\Events\ChannelCreated;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyChannelCreated implements ShouldQueue
{
    public function handle(ChannelCreated $event)
    {
        $message = sprintf(
            '<@%s> created channel <#%s> with name `%s`',
            $event->payload->channel->creator,
            $event->payload->channel->id,
            $event->payload->channel->name
        );

        Messenger::send(config('services.slack.channel_report_chanid'), $message, ':arrow_up:');
    }
}
