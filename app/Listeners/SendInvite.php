<?php

namespace App\Listeners;

use App\Events\InviteRequested;
use App\Libs\LegacySlack;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvite implements ShouldQueue
{
    public function handle(InviteRequested $event)
    {
        $slack = new LegacySlack();
        $slack->invite($event->email);
    }
}
