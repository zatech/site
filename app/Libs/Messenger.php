<?php

namespace App\Libs;

use GuzzleHttp\Client as GuzzleClient;

class Messenger
{
    // https://api.slack.com/methods/chat.postMessage
    public static function send(string $channel, string $text, string $emoji = ':v:')
    {
        $client = new GuzzleClient();
        return $client->request('POST', 'https://slack.com/api/chat.postMessage', [
            'form_params' => [
                'token' => config('services.slack.oauth_token'),
                'channel' => $channel,
                'text' => $text,
                'icon_emoji' => $emoji,
            ],
        ]);
    }

    // https://api.slack.com/methods/chat.postEphemeral
    public static function sendEphemeral(string $channel, string $user, string $text, string $emoji = ':v:')
    {
        $client = new GuzzleClient();
        return $client->request('POST', 'https://slack.com/api/chat.postEphemeral', [
            'form_params' => [
                'token' => config('services.slack.oauth_token'),
                'channel' => $channel,
                'user' => $user,
                'text' => $text,
                'icon_emoji' => $emoji,
            ],
        ]);
    }
}
