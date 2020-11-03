<?php

namespace App\Http\Controllers\Slack;

use App\Events\ChannelArchived;
use App\Events\ChannelCreated;
use App\Events\ChannelDeleted;
use App\Events\ChannelRenamed;
use App\Events\ChannelUnArchived;
use App\Events\EmojiChanged;
use App\Events\Message;
use App\Events\MessageDeleted;
use App\Events\TeamJoin;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Log;

class EventController extends BaseController
{
    public function __invoke(Request $request)
    {
        switch ($request->input('type')) {
            case 'url_verification':
                return self::handleHandshake($request);
            case 'event_callback':
                $payload = json_decode($request->getContent());
                self::handleCallback($payload->event);
                break;
            default:
                Log::debug(sprintf('Unhandled Event: %s', $request->getContent()));
        }

        return response('OK')->header('X-Slack-No-Retry', 1);
    }

    private function handleHandshake(Request $request)
    {
        return response()->json([
            'challenge' => $request->input('challenge'),
        ]);
    }

    private function handleCallback(object $payload)
    {
        switch ($payload->type) {
            case 'team_join':
                event(new TeamJoin($payload));
                break;
            case 'message':
                self::handleMessage($payload);
                break;
            case 'channel_created':
                event(new ChannelCreated($payload));
                break;
            case 'channel_deleted':
                event(new ChannelDeleted($payload));
                break;
            case 'channel_archive':
                event(new ChannelArchived($payload));
                break;
            case 'channel_rename':
                event(new ChannelRenamed($payload));
                break;
            case 'channel_unarchive':
                event(new ChannelUnArchived($payload));
                break;
            case 'emoji_changed':
                event(new EmojiChanged($payload));
                break;
            default:
                Log::debug('Unhandled Event Callback Payload', (array) $payload);
        }
    }

    private function handleMessage(object $payload)
    {
        if (!isset($payload->subtype)) {
            event(new Message($payload));
            return;
        }

        switch ($payload->subtype) {
            case 'bot_message':
            case 'message_changed':
            case 'channel_join':
            case 'channel_purpose':
            case 'channel_topic':
            case 'file_share':
            case 'me_message':
            case 'thread_broadcast':
                // Skip?
                break;
            case 'message_deleted':
                event(new MessageDeleted($payload));
                break;
            default:
                Log::debug(sprintf('Unhandled message->subtype %s', $payload->subtype));
        }
    }
}
