<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class AnonReport
{
    use Dispatchable;

    public string $report;

    public function __construct(string $report)
    {
        $this->report = $report;
    }
}
