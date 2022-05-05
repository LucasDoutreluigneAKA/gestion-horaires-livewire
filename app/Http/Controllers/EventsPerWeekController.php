<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

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
        return $this->getEventsOfWeek(Date::now());
    }


    public function getEventsOfWeek($date)
    {
        if($date == null || !Date::isValidDate($date)){
            $day = Date::now();
        }

        $day = Date::parse($date);
        $startOfWeek = $day->copy()->startOfWeek()->startOfDay();
        $endOfWeek = $day->copy()->endOfWeek()->endOfDay();

        return
            // Event::where(
            //     function($query) use($day)
            //     {
            //         Date::setLocale('fr');
            //         ddd(DB::raw('*'));
            //         // $first_date = Date::setTimezone('UTC')->parse(DB::raw('first_date'));
            //         $first_date = Date::parse(DB::raw('first_date'))->setTimezone('UTC');
            //         // $query->whereBetween($first_date, [$startOfWeek->startOfDay(), $endOfWeek->endOfDay()]);
            //     }
            // )
            Event::whereBetween('date', [$startOfWeek, $endOfWeek])
            ->orderBy('begin_hour', 'asc')
            ->get();
    }
}
