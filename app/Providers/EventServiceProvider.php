<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\AnonReport::class => [
            \App\Listeners\SendAnonReport::class,
        ],
        \App\Events\InviteRequested::class => [
            \App\Listeners\SendInvite::class,
        ],
        \App\Events\ChannelCreated::class => [
            \App\Listeners\NotifyChannelCreated::class,
        ],
        \App\Events\ChannelDeleted::class => [
            \App\Listeners\NotifyChannelDeleted::class,
        ],
        \App\Events\ChannelArchived::class => [
            \App\Listeners\NotifyChannelArchived::class,
        ],
        \App\Events\ChannelRenamed::class => [
            \App\Listeners\NotifyChannelRenamed::class,
        ],
        \App\Events\ChannelUnArchived::class => [
            \App\Listeners\NotifyChannelUnArchived::class,
        ],
        \App\Events\EmojiChanged::class => [
            \App\Listeners\NotifyEmojiChanged::class,
        ],
        \App\Events\Message::class => [
            \App\Listeners\CheckMessageForGuys::class,
        ],
        \App\Events\MessageDeleted::class => [
            \App\Listeners\NotifyMessageDeleted::class,
        ],
    ];
}
