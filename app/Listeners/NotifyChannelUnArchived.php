<?php

namespace App\Listeners;

use App\Events\ChannelUnArchived;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyChannelUnArchived implements ShouldQueue
{
    public function handle(ChannelUnArchived $event)
    {
        $message = sprintf(
            '<@%s> unarchived channel <#%s>',
            $event->payload->user,
            $event->payload->channel
        );

        Messenger::send(config('services.slack.channel_report_chanid'), $message, ':arrow_up:');
    }
}
