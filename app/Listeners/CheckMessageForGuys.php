<?php

namespace App\Listeners;

use App\Events\Message;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Log;

class CheckMessageForGuys implements ShouldQueue
{
    private const SEARCH = [
        'guyz',
        'hey guys',
        'hi guys',
        'my guys',
        'thanks guys',
        'the guys',
        'these guys',
        'those guys',
        'you guys',
    ];

    private const BASE_RESPONSE = 'Some people in the community find "guys" alienating, next time would you consider _%s_? :slightly_smiling_face: (<http://bit.ly/2uJCn3y|Learn more>)';

    private const RESPONSES = [
        'all',
        'everyone',
        'folks',
        'y\'all',
    ];

    public function handle(Message $event)
    {
        if (!config('features.guysbot')) {
            return;
        }

        if (!Str::contains($event->payload->text, self::SEARCH)) {
            return;
        }

        $response = sprintf(self::BASE_RESPONSE, Arr::random(self::RESPONSES));
        Messenger::sendEphemeral($event->payload->channel, $event->payload->user, $response, ':v:');

        Log::info(sprintf(
            '%s hit from %s in %s: %s',
            __CLASS__,
            $event->payload->user,
            $event->payload->channel,
            $event->payload->text
        ));
    }
}
