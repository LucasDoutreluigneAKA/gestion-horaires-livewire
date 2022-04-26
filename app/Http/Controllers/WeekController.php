<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class WeekController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getCurrentWeekData();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        return $this->getWeekData($date);
    }



    public function getWeekData($date){

        if($date == null || !Date::isValidDate($date)){
            return response()->json([
                "error" => "Cette date n'existe pas."
            ]);
        }

        $day = Date::parse($date);

        return response()->json([
            'data' => [

                'day' => Date::parse($date)->format('d-m-Y'),

                'day_week' => [
                    'monday' => Date::parse($date)->startOfWeek()->format('d-m-Y'),
                    'tuesday' => Date::parse($date)->startOfWeek()->add("1 day")->format('d-m-Y'),
                    'wednesday' => Date::parse($date)->startOfWeek()->add("2 day")->format('d-m-Y'),
                    'thursday' => Date::parse($date)->startOfWeek()->add("3 day")->format('d-m-Y'),
                    'friday' => Date::parse($date)->startOfWeek()->add("4 day")->format('d-m-Y')
                ],

                'weeks' => [

                    '0' => [
                        'monday' => Date::parse($date)->startOfWeek()->sub("21 day")->format('d-m-Y'),
                        'tuesday' => Date::parse($date)->startOfWeek()->sub("20 day")->format('d-m-Y'),
                        'wednesday' => Date::parse($date)->startOfWeek()->sub("19 day")->format('d-m-Y'),
                        'thursday' => Date::parse($date)->startOfWeek()->sub("18 day")->format('d-m-Y'),
                        'friday' => Date::parse($date)->startOfWeek()->sub("17 day")->format('d-m-Y')
                    ],

                    '1' => [
                        'monday' => Date::parse($date)->startOfWeek()->sub("14 day")->format('d-m-Y'),
                        'tuesday' => Date::parse($date)->startOfWeek()->sub("13 day")->format('d-m-Y'),
                        'wednesday' => Date::parse($date)->startOfWeek()->sub("12 day")->format('d-m-Y'),
                        'thursday' => Date::parse($date)->startOfWeek()->sub("11 day")->format('d-m-Y'),
                        'friday' => Date::parse($date)->startOfWeek()->sub("10 day")->format('d-m-Y')
                    ],

                    '2' => [
                        'monday' => Date::parse($date)->startOfWeek()->sub("7 day")->format('d-m-Y'),
                        'tuesday' => Date::parse($date)->startOfWeek()->sub("6 day")->format('d-m-Y'),
                        'wednesday' => Date::parse($date)->startOfWeek()->sub("5 day")->format('d-m-Y'),
                        'thursday' => Date::parse($date)->startOfWeek()->sub("4 day")->format('d-m-Y'),
                        'friday' => Date::parse($date)->startOfWeek()->sub("3 day")->format('d-m-Y')
                    ],

                    '3' => [
                        'monday' => Date::parse($date)->startOfWeek()->format('d-m-Y'),
                        'tuesday' => Date::parse($date)->startOfWeek()->add("1 day")->format('d-m-Y'),
                        'wednesday' => Date::parse($date)->startOfWeek()->add("2 day")->format('d-m-Y'),
                        'thursday' => Date::parse($date)->startOfWeek()->add("3 day")->format('d-m-Y'),
                        'friday' => Date::parse($date)->startOfWeek()->add("4 day")->format('d-m-Y')
                    ],

                    '4' => [
                        'monday' => Date::parse($date)->startOfWeek()->add("7 day")->format('d-m-Y'),
                        'tuesday' => Date::parse($date)->startOfWeek()->add("8 day")->format('d-m-Y'),
                        'wednesday' => Date::parse($date)->startOfWeek()->add("9 day")->format('d-m-Y'),
                        'thursday' => Date::parse($date)->startOfWeek()->add("10 day")->format('d-m-Y'),
                        'friday' => Date::parse($date)->startOfWeek()->add("11 day")->format('d-m-Y')
                    ],

                    '5' => [
                        'monday' => Date::parse($date)->startOfWeek()->add("14 day")->format('d-m-Y'),
                        'tuesday' => Date::parse($date)->startOfWeek()->add("15 day")->format('d-m-Y'),
                        'wednesday' => Date::parse($date)->startOfWeek()->add("16 day")->format('d-m-Y'),
                        'thursday' => Date::parse($date)->startOfWeek()->add("17 day")->format('d-m-Y'),
                        'friday' => Date::parse($date)->startOfWeek()->add("18 day")->format('d-m-Y')
                    ],

                    '6' => [
                        'monday' => Date::parse($date)->startOfWeek()->add("21 day")->format('d-m-Y'),
                        'tuesday' => Date::parse($date)->startOfWeek()->add("22 day")->format('d-m-Y'),
                        'wednesday' => Date::parse($date)->startOfWeek()->add("23 day")->format('d-m-Y'),
                        'thursday' => Date::parse($date)->startOfWeek()->add("24 day")->format('d-m-Y'),
                        'friday' => Date::parse($date)->startOfWeek()->add("25 day")->format('d-m-Y')
                    ]
                ]
            ]
        ]);

    }


    public function getCurrentWeekData(){

        $now = Date::now();

        return response()->json([
            'data' => [

                'day' => Date::now()->format('d-m-Y'),

                'day_week' => [
                    'monday' => Date::now()->startOfWeek()->format('d-m-Y'),
                    'tuesday' => Date::now()->startOfWeek()->add("1 day")->format('d-m-Y'),
                    'wednesday' => Date::now()->startOfWeek()->add("2 day")->format('d-m-Y'),
                    'thursday' => Date::now()->startOfWeek()->add("3 day")->format('d-m-Y'),
                    'friday' => Date::now()->startOfWeek()->add("4 day")->format('d-m-Y')
                ],

                'weeks' => [
                    '0' => [
                        'monday' => Date::now()->startOfWeek()->sub("21 day")->format('d-m-Y'),
                        'tuesday' => Date::now()->startOfWeek()->sub("20 day")->format('d-m-Y'),
                        'wednesday' => Date::now()->startOfWeek()->sub("19 day")->format('d-m-Y'),
                        'thursday' => Date::now()->startOfWeek()->sub("18 day")->format('d-m-Y'),
                        'friday' => Date::now()->startOfWeek()->sub("17 day")->format('d-m-Y')
                    ],

                    '1' => [
                        'monday' => Date::now()->startOfWeek()->sub("14 day")->format('d-m-Y'),
                        'tuesday' => Date::now()->startOfWeek()->sub("13 day")->format('d-m-Y'),
                        'wednesday' => Date::now()->startOfWeek()->sub("12 day")->format('d-m-Y'),
                        'thursday' => Date::now()->startOfWeek()->sub("11 day")->format('d-m-Y'),
                        'friday' => Date::now()->startOfWeek()->sub("10 day")->format('d-m-Y')
                    ],

                    '2' => [
                        'monday' => Date::now()->startOfWeek()->sub("7 day")->format('d-m-Y'),
                        'tuesday' => Date::now()->startOfWeek()->sub("6 day")->format('d-m-Y'),
                        'wednesday' => Date::now()->startOfWeek()->sub("5 day")->format('d-m-Y'),
                        'thursday' => Date::now()->startOfWeek()->sub("4 day")->format('d-m-Y'),
                        'friday' => Date::now()->startOfWeek()->sub("3 day")->format('d-m-Y')
                    ],

                    '3' => [
                        'monday' => Date::now()->startOfWeek()->format('d-m-Y'),
                        'tuesday' => Date::now()->startOfWeek()->add("1 day")->format('d-m-Y'),
                        'wednesday' => Date::now()->startOfWeek()->add("2 day")->format('d-m-Y'),
                        'thursday' => Date::now()->startOfWeek()->add("3 day")->format('d-m-Y'),
                        'friday' => Date::now()->startOfWeek()->add("4 day")->format('d-m-Y')
                    ],

                    '4' => [
                        'monday' => Date::now()->startOfWeek()->add("7 day")->format('d-m-Y'),
                        'tuesday' => Date::now()->startOfWeek()->add("8 day")->format('d-m-Y'),
                        'wednesday' => Date::now()->startOfWeek()->add("9 day")->format('d-m-Y'),
                        'thursday' => Date::now()->startOfWeek()->add("10 day")->format('d-m-Y'),
                        'friday' => Date::now()->startOfWeek()->add("11 day")->format('d-m-Y')
                    ],

                    '5' => [
                        'monday' => Date::now()->startOfWeek()->add("14 day")->format('d-m-Y'),
                        'tuesday' => Date::now()->startOfWeek()->add("15 day")->format('d-m-Y'),
                        'wednesday' => Date::now()->startOfWeek()->add("16 day")->format('d-m-Y'),
                        'thursday' => Date::now()->startOfWeek()->add("17 day")->format('d-m-Y'),
                        'friday' => Date::now()->startOfWeek()->add("18 day")->format('d-m-Y')
                    ],

                    '6' => [
                        'monday' => Date::now()->startOfWeek()->add("21 day")->format('d-m-Y'),
                        'tuesday' => Date::now()->startOfWeek()->add("22 day")->format('d-m-Y'),
                        'wednesday' => Date::now()->startOfWeek()->add("23 day")->format('d-m-Y'),
                        'thursday' => Date::now()->startOfWeek()->add("24 day")->format('d-m-Y'),
                        'friday' => Date::now()->startOfWeek()->add("25 day")->format('d-m-Y')
                    ]
                ]
            ]
        ]);
    }

}
