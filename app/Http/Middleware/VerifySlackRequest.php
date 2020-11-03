<?php

namespace App\Http\Middleware;

use App;
use Closure;

class VerifySlackRequest
{
    // https://api.slack.com/docs/verifying-requests-from-slack#a_recipe_for_security
    // @TODO: Check the timestamp is believable?
    public function handle($request, Closure $next, string $secret = null)
    {
        if (App::environment('local')) {
            return $next($request);
        }

        $slackSig = $request->header('X-Slack-Signature');
        abort_if(!$slackSig, 401, 'No X-Slack-Signature!');

        $base = implode(':', [
            'v0',
            $request->header('X-Slack-Request-Timestamp'),
            $request->getContent(),
        ]);

        $ourSig = 'v0=' . hash_hmac('sha256', $base, config('services.slack.secret'));
        abort_if($slackSig !== $ourSig, 401, 'Failed to verify X-Slack-Signature.');

        return $next($request);
    }
}
