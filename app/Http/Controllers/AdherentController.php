<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdherentController extends Controller
{
    public function adherentList()
    {
        $adherents = DB::table('adherents')
            ->get();

        return $adherents;
    }
}
