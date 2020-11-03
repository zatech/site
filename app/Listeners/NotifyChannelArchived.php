<?php

namespace App\Listeners;

use App\Events\ChannelArchived;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyChannelArchived implements ShouldQueue
{
    public function handle(ChannelArchived $event)
    {
        $message = sprintf(
            '<@%s> archived channel <#%s>',
            $event->payload->user,
            $event->payload->channel
        );

        Messenger::send(config('services.slack.channel_report_chanid'), $message, ':arrow_down:');
    }
}
