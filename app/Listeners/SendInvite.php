<?php

namespace App\Listeners;

use App\Events\InviteRequested;
use App\Libs\LegacySlack;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvite implements ShouldQueue
{
    public function handle(InviteRequested $event)
    {
        LegacySlack::invite($event->email);
    }
}
