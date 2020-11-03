<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportGetController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('report', [
            'received' => $request->input('received'),
        ]);
    }
}
