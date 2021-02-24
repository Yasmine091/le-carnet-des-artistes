<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function eventList()
    {
        $events = DB::table('events')
            ->get();

        return $events;
    }
}
