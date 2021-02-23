<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogActivityController extends Controller
{




    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('log_activity.index',compact('logs'));
    }
}
