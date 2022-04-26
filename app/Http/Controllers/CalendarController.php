<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller{

    public function show(){
        $dateNow = Carbon::now();

        $weeks = [
            [
                'firstDay' => $dateNow,
                'lastDay' => $dateNow
            ]
        ];

        return view('calendar', [
            'weeks' => $weeks
        ]);
    }

}
