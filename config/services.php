<?php

return [

    'google' => [
        'analytics' => env('GOOGLE_ANALYTICS'),
    ],

    'slack' => [
        'domain' => env('SLACK_DOMAIN'),
        'secret' => env('SLACK_SECRET'),
        'token' => env('SLACK_TOKEN'),
        'oauth_token' => env('SLACK_OAUTH_TOKEN'),
        'legacy_token' => env('SLACK_LEGACY_TOKEN'),
        'anon_report_chanid' => env('SLACK_ANON_REPORT_CHANID'),
        'channel_report_chanid' => env('SLACK_CHANNEL_REPORT_CHANID'),
        'emoji_report_chanid' => env('SLACK_EMOJI_REPORT_CHANID'),
        'message_delete_chanid' => env('SLACK_MESSAGE_DELETE_CHANID'),
    ],

];
