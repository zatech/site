<?php

namespace App\Libs;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Collection;
use Log;

class LegacySlack
{
    public static function invite(string $email): object
    {
        $client = new GuzzleClient([
            'base_uri' => sprintf('https://%s.slack.com/api/', config('services.slack.domain')),
            'timeout' => 10.0,
        ]);

        $response = $client->request('POST', 'users.admin.invite', [
            'form_params' => [
                'token' => config('services.slack.legacy_token'),
                'email' => $email,
            ],
        ]);

        Log::debug(sprintf('%s invite: %s got: %s', __CLASS__, $email, $response->getBody()));

        return json_decode($response->getBody());
    }
}
