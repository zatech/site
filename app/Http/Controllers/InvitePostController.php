<?php

namespace App\Http\Controllers;

use App\Events\InviteRequested;
use Illuminate\Http\Request;

class InvitePostController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'code-of-conduct' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        event(new InviteRequested($request->input('email')));

        return redirect()->route('welcome', [
            'sent' => true,
        ]);
    }
}
