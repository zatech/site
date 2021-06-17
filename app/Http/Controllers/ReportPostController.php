<?php

namespace App\Http\Controllers;

use App\Events\AnonReport;
use Illuminate\Http\Request;

class ReportPostController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'report' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        event(new AnonReport($request->input('report')));

        return redirect()->route('report', [
            'received' => true,
        ]);
    }
}
