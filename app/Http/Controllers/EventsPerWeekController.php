<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class EventsPerWeekController extends Controller
{
    /**
     * Retourne les évènements de la semaine
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getEventsOfCurrentWeek();
    }


    public function show($date)
    {
        return $this->getEventsOfWeek($date);
    }

    public function getEventsOfCurrentWeek(){
        return $this->getEventsOfWeek(Date::now()->format('d-m-Y'));
    }


    public function getEventsOfWeek($date)
    {
        if($date == null || !Date::isValidDate($date)){
            return response()->json([
                "error" => "Cette date n'existe pas."
            ]);
        }

        $day = Date::parse($date);
        $startOfWeek = $day->startOfWeek();
        $endOfWeek = $day->endOfWeek();

        return Event::whereBetween('event_first_date', [$startOfWeek, $endOfWeek])
            ->orWhere('event_do_every_day', '=', 1)
            ->orWhere('event_do_every_week', '=', 1)
            ->orWhere([
                ['event_do_every_two_weeks', '=', '1'],
                ['event_first_date_week_parity', '=', intval($day->format('W')) % 2]
            ])
            ->orderBy('event_begin_hour', 'asc')
            ->get();
    }
}
