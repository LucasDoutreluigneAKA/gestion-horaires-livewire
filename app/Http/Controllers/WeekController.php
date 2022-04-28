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
                    'monday' => $day->copy()->format('d-m-Y'),
                    'tuesday' => $day->copy()->add("1 day")->format('d-m-Y'),
                    'wednesday' => $day->copy()->add("2 day")->format('d-m-Y'),
                    'thursday' => $day->copy()->add("3 day")->format('d-m-Y'),
                    'friday' => $day->copy()->add("4 day")->format('d-m-Y')
                ],

                'weeks' => [

                    '0' => [
                        'monday' => $day->copy()->sub("21 day")->format('d-m-Y'),
                        'tuesday' => $day->copy()->sub("20 day")->format('d-m-Y'),
                        'wednesday' => $day->copy()->sub("19 day")->format('d-m-Y'),
                        'thursday' => $day->copy()->sub("18 day")->format('d-m-Y'),
                        'friday' => $day->copy()->sub("17 day")->format('d-m-Y')
                    ],

                    '1' => [
                        'monday' => $day->copy()->sub("14 day")->format('d-m-Y'),
                        'tuesday' => $day->copy()->sub("13 day")->format('d-m-Y'),
                        'wednesday' => $day->copy()->sub("12 day")->format('d-m-Y'),
                        'thursday' => $day->copy()->sub("11 day")->format('d-m-Y'),
                        'friday' => $day->copy()->sub("10 day")->format('d-m-Y')
                    ],

                    '2' => [
                        'monday' => $day->copy()->sub("7 day")->format('d-m-Y'),
                        'tuesday' => $day->copy()->sub("6 day")->format('d-m-Y'),
                        'wednesday' => $day->copy()->sub("5 day")->format('d-m-Y'),
                        'thursday' => $day->copy()->sub("4 day")->format('d-m-Y'),
                        'friday' => $day->copy()->sub("3 day")->format('d-m-Y')
                    ],

                    '3' => [
                        'monday' => $day->copy()->format('d-m-Y'),
                        'tuesday' => $day->copy()->add("1 day")->format('d-m-Y'),
                        'wednesday' => $day->copy()->add("2 day")->format('d-m-Y'),
                        'thursday' => $day->copy()->add("3 day")->format('d-m-Y'),
                        'friday' => $day->copy()->add("4 day")->format('d-m-Y')
                    ],

                    '4' => [
                        'monday' => $day->copy()->add("7 day")->format('d-m-Y'),
                        'tuesday' => $day->copy()->add("8 day")->format('d-m-Y'),
                        'wednesday' => $day->copy()->add("9 day")->format('d-m-Y'),
                        'thursday' => $day->copy()->add("10 day")->format('d-m-Y'),
                        'friday' => $day->copy()->add("11 day")->format('d-m-Y')
                    ],

                    '5' => [
                        'monday' => $day->copy()->add("14 day")->format('d-m-Y'),
                        'tuesday' => $day->copy()->add("15 day")->format('d-m-Y'),
                        'wednesday' => $day->copy()->add("16 day")->format('d-m-Y'),
                        'thursday' => $day->copy()->add("17 day")->format('d-m-Y'),
                        'friday' => $day->copy()->add("18 day")->format('d-m-Y')
                    ],

                    '6' => [
                        'monday' => $day->copy()->add("21 day")->format('d-m-Y'),
                        'tuesday' => $day->copy()->add("22 day")->format('d-m-Y'),
                        'wednesday' => $day->copy()->add("23 day")->format('d-m-Y'),
                        'thursday' => $day->copy()->add("24 day")->format('d-m-Y'),
                        'friday' => $day->copy()->add("25 day")->format('d-m-Y')
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
                    'monday' => $now->copy()->format('d-m-Y'),
                    'tuesday' => $now->copy()->add("1 day")->format('d-m-Y'),
                    'wednesday' => $now->copy()->add("2 day")->format('d-m-Y'),
                    'thursday' => $now->copy()->add("3 day")->format('d-m-Y'),
                    'friday' => $now->copy()->add("4 day")->format('d-m-Y')
                ],

                'weeks' => [
                    '0' => [
                        'monday' => $now->copy()->sub("21 day")->format('d-m-Y'),
                        'tuesday' => $now->copy()->sub("20 day")->format('d-m-Y'),
                        'wednesday' => $now->copy()->sub("19 day")->format('d-m-Y'),
                        'thursday' => $now->copy()->sub("18 day")->format('d-m-Y'),
                        'friday' => $now->copy()->sub("17 day")->format('d-m-Y')
                    ],

                    '1' => [
                        'monday' => $now->copy()->sub("14 day")->format('d-m-Y'),
                        'tuesday' => $now->copy()->sub("13 day")->format('d-m-Y'),
                        'wednesday' => $now->copy()->sub("12 day")->format('d-m-Y'),
                        'thursday' => $now->copy()->sub("11 day")->format('d-m-Y'),
                        'friday' => $now->copy()->sub("10 day")->format('d-m-Y')
                    ],

                    '2' => [
                        'monday' => $now->copy()->sub("7 day")->format('d-m-Y'),
                        'tuesday' => $now->copy()->sub("6 day")->format('d-m-Y'),
                        'wednesday' => $now->copy()->sub("5 day")->format('d-m-Y'),
                        'thursday' => $now->copy()->sub("4 day")->format('d-m-Y'),
                        'friday' => $now->copy()->sub("3 day")->format('d-m-Y')
                    ],

                    '3' => [
                        'monday' => $now->copy()->format('d-m-Y'),
                        'tuesday' => $now->copy()->add("1 day")->format('d-m-Y'),
                        'wednesday' => $now->copy()->add("2 day")->format('d-m-Y'),
                        'thursday' => $now->copy()->add("3 day")->format('d-m-Y'),
                        'friday' => $now->copy()->add("4 day")->format('d-m-Y')
                    ],

                    '4' => [
                        'monday' => $now->copy()->add("7 day")->format('d-m-Y'),
                        'tuesday' => $now->copy()->add("8 day")->format('d-m-Y'),
                        'wednesday' => $now->copy()->add("9 day")->format('d-m-Y'),
                        'thursday' => $now->copy()->add("10 day")->format('d-m-Y'),
                        'friday' => $now->copy()->add("11 day")->format('d-m-Y')
                    ],

                    '5' => [
                        'monday' => $now->copy()->add("14 day")->format('d-m-Y'),
                        'tuesday' => $now->copy()->add("15 day")->format('d-m-Y'),
                        'wednesday' => $now->copy()->add("16 day")->format('d-m-Y'),
                        'thursday' => $now->copy()->add("17 day")->format('d-m-Y'),
                        'friday' => $now->copy()->add("18 day")->format('d-m-Y')
                    ],

                    '6' => [
                        'monday' => $now->copy()->add("21 day")->format('d-m-Y'),
                        'tuesday' => $now->copy()->add("22 day")->format('d-m-Y'),
                        'wednesday' => $now->copy()->add("23 day")->format('d-m-Y'),
                        'thursday' => $now->copy()->add("24 day")->format('d-m-Y'),
                        'friday' => $now->copy()->add("25 day")->format('d-m-Y')
                    ]
                ]
            ]
        ]);
    }

}
