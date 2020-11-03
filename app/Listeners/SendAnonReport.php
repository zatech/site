<?php

namespace App\Listeners;

use App\Events\AnonReport;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAnonReport implements ShouldQueue
{
    public function handle(AnonReport $event)
    {
        Messenger::send(config('services.slack.anon_report_chanid'), $event->report, ':ambulance:');
    }
}
