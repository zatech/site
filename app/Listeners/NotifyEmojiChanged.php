<?php

namespace App\Listeners;

use App\Events\EmojiChanged;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class NotifyEmojiChanged implements ShouldQueue
{
    public function handle(EmojiChanged $event)
    {
        if (!isset($event->payload->subtype)) {
            Log::debug(sprintf('%s got no subtype for event: %s', __CLASS__, json_encode($event->payload)));
            return;
        }

        switch ($event->payload->subtype) {
            case 'add':
                self::handleAdd($event->payload);
                break;
            case 'remove':
                self::handleRemove($event->payload);
                break;
            default:
                Log::debug(sprintf(
                    '%s unhandled subtype "%s" for event: %s',
                    __CLASS__,
                    $event->payload->subtype,
                    json_encode($event->payload)
                ));
        }
    }

    private static function handleAdd(object $payload)
    {
        $message = sprintf(
            'Added: :%s: as `:%s:` (%s)',
            $payload->name,
            $payload->name,
            $payload->value
        );

        $emoji = sprintf(':%s:', $payload->name);

        Messenger::send(config('services.slack.emoji_report_chanid'), $message, $emoji);
    }

    private static function handleRemove(object $payload)
    {
        $names = collect($payload->names)->map(function ($e) {
            return sprintf('`:%s:`', $e);
        })->join(' ');

        $message = sprintf('Removed: %s', $names);

        Messenger::send(config('services.slack.emoji_report_chanid'), $message, ':candle:');
    }
}
