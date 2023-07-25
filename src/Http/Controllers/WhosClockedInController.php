<?php

namespace ReesMcIvor\ClockIn\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhosClockedInController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('orbit.whos_clocked_in');
    }
}
