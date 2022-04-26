<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Date::setLocale('fr');


        /**
         * Tous les jours
         */
        $date_1 = Date::parse("14-03-2022");
        Event::create([
            "event_name" => "Pause déjeuner",
            "event_description" => "Pour manger",
            "event_first_date" => $date_1,
            "event_first_date_day_name" => $date_1->format('l'),
            "event_first_date_week_parity" => intval($date_1->format('W')) % 2,
            "event_begin_hour" => "11:30",
            "event_end_hour" => "13:00",
            "event_do_every_day" => true
        ]);

        /**
         * Lundi
         */

        $date1 = Date::parse("14-03-2022");
        Event::create([
            "event_name" => "M4101 syst cours",
            "event_description" => "Cours magistral",
            "event_first_date" => $date1,
            "event_first_date_day_name" => $date1->format('l'),
            "event_first_date_week_parity" => intval($date1->format('W')) % 2,
            "event_begin_hour" => "08:30",
            "event_end_hour" => "10:00",
            "event_do_every_week" => true
        ]);

        $date2 = Date::parse("14-03-2022");
        Event::create([
            "event_name" => "M4105 RV",
            "event_description" => "Cours magistral",
            "event_first_date" => $date2,
            "event_first_date_day_name" => $date2->format('l'),
            "event_first_date_week_parity" => intval($date2->format('W')) % 2,
            "event_begin_hour" => "10:00",
            "event_end_hour" => "11:30",
            "event_do_every_week" => true
        ]);

        $date3 = Date::parse("14-03-2022");
        Event::create([
            "event_name" => "M4101 syst cours",
            "event_description" => "Cours magistral",
            "event_first_date" => $date3,
            "event_first_date_day_name" => $date3->format('l'),
            "event_first_date_week_parity" => intval($date3->format('W')) % 2,
            "event_begin_hour" => "13:00",
            "event_end_hour" => "14:30",
            "event_do_every_week" => true
        ]);

        /**
         * Une semaine sur deux
         */
        $date4 = Date::parse("14-03-2022");
        Event::create([
            "event_name" => "M4201 PEL trait de l'info",
            "event_description" => "TP",
            "event_first_date" => $date4,
            "event_first_date_day_name" => $date4->format('l'),
            "event_first_date_week_parity" => intval($date4->format('W')) % 2,
            "event_begin_hour" => "14:30",
            "event_end_hour" => "17:30",
            "event_do_every_two_weeks" => true
        ]);

        $date5 = Date::parse("21-03-2022");
        Event::create([
            "event_name" => "M4203 com",
            "event_description" => "TP",
            "event_first_date" => $date5,
            "event_first_date_day_name" => $date5->format('l'),
            "event_first_date_week_parity" => intval($date5->format('W')) % 2,
            "event_begin_hour" => "14:30",
            "event_end_hour" => "17:30",
            "event_do_every_two_weeks" => true
        ]);

        $date6 = Date::parse("21-03-2022");
        Event::create([
            "event_name" => "M4204 anglais",
            "event_description" => "TP",
            "event_first_date" => $date6,
            "event_first_date_day_name" => $date6->format('l'),
            "event_first_date_week_parity" => intval($date6->format('W')) % 2,
            "event_begin_hour" => "17:30",
            "event_end_hour" => "19:00",
            "event_do_every_two_weeks" => true
        ]);

    }
}
