<?php

namespace App\Listeners;

use App\Events\ChannelDeleted;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyChannelDeleted implements ShouldQueue
{
    public function handle(ChannelDeleted $event)
    {
        $message = sprintf(
            '<@%s> deleted channel <#%s>',
            $event->payload->actor_id,
            $event->payload->channel
        );

        Messenger::send(config('services.slack.channel_report_chanid'), $message, ':arrow_down:');
    }
}
