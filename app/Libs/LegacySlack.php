<?php

namespace App\Libs;

use Exception;
use Illuminate\Support\Collection;
use Log;

class LegacySlack
{
    private $client;
    private $token;

    /*
    private static function responseKeyOrFail($response, $key)
    {
        if (isset($response->$key)) {
            return $response->$key;
        } else {
            throw new Exception(sprintf('Failed for key %s: %s', $key, data_get($response, 'error')));
        }
    }
    */

    public function __construct()
    {
        $this->token = config('services.slack.legacy_token');

        $this->client = new \GuzzleHttp\Client([
            'base_uri' => sprintf('https://%s.slack.com/api/', config('services.slack.domain')),
            'timeout' => 10.0,
        ]);
    }

    public function invite(string $email): object
    {
        $response = $this->client->request('POST', 'users.admin.invite', [
            'form_params' => [
                'token' => $this->token,
                'email' => $email,
            ],
        ]);

        Log::debug(sprintf('%s invite: %s got: %s', __CLASS__, $email, $response->getBody()));

        return json_decode($response->getBody());
    }
}
