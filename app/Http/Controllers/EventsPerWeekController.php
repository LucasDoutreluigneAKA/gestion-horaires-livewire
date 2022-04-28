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
        $startOfWeek = $day->startOfWeek()->startOfDay();
        $endOfWeek = $day->endOfWeek()->endOfDay();

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
            Event::whereBetween('first_date', [$startOfWeek, $endOfWeek])
            ->orWhere('do_every_day', '=', 1)
            ->orWhere('do_every_week', '=', 1)
            ->orWhere(
                function($query) use($day)
                {
                    $query->where('do_every_two_weeks', 1)
                          ->where('first_date_week_parity', intval($day->format('W')) % 2);
                }
            )
            ->orderBy('begin_hour', 'asc')
            ->get();
    }
}
