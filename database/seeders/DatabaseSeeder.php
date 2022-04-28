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
            "name" => "Pause déjeuner",
            "description" => "Pour manger",
            "first_date" => $date_1,
            "first_date_day_name" => $date_1->format('l'),
            "first_date_week_parity" => intval($date_1->format('W')) % 2,
            "begin_hour" => "11:30",
            "end_hour" => "13:00",
            "do_every_day" => true
        ]);

        /**
         * Lundi
         */

        $date1 = Date::parse("14-03-2022");
        Event::create([
            "name" => "M4101 syst cours",
            "description" => "Cours magistral",
            "first_date" => $date1,
            "first_date_day_name" => $date1->format('l'),
            "first_date_week_parity" => intval($date1->format('W')) % 2,
            "begin_hour" => "08:30",
            "end_hour" => "10:00",
            "do_every_week" => true
        ]);

        $date2 = Date::parse("14-03-2022");
        Event::create([
            "name" => "M4105 RV",
            "description" => "Cours magistral",
            "first_date" => $date2,
            "first_date_day_name" => $date2->format('l'),
            "first_date_week_parity" => intval($date2->format('W')) % 2,
            "begin_hour" => "10:00",
            "end_hour" => "11:30",
            "do_every_week" => true
        ]);

        $date3 = Date::parse("14-03-2022");
        Event::create([
            "name" => "M4101 syst cours",
            "description" => "Cours magistral",
            "first_date" => $date3,
            "first_date_day_name" => $date3->format('l'),
            "first_date_week_parity" => intval($date3->format('W')) % 2,
            "begin_hour" => "13:00",
            "end_hour" => "14:30",
            "do_every_week" => true
        ]);

        /**
         * Une semaine sur deux
         */
        $date4 = Date::parse("14-03-2022");
        Event::create([
            "name" => "M4201 PEL trait de l'info",
            "description" => "TP",
            "first_date" => $date4,
            "first_date_day_name" => $date4->format('l'),
            "first_date_week_parity" => intval($date4->format('W')) % 2,
            "begin_hour" => "14:30",
            "end_hour" => "17:30",
            "do_every_two_weeks" => true
        ]);

        $date5 = Date::parse("21-03-2022");
        Event::create([
            "name" => "M4203 com",
            "description" => "TP",
            "first_date" => $date5,
            "first_date_day_name" => $date5->format('l'),
            "first_date_week_parity" => intval($date5->format('W')) % 2,
            "begin_hour" => "14:30",
            "end_hour" => "17:30",
            "do_every_two_weeks" => true
        ]);

        $date6 = Date::parse("21-03-2022");
        Event::create([
            "name" => "M4204 anglais",
            "description" => "TP",
            "first_date" => $date6,
            "first_date_day_name" => $date6->format('l'),
            "first_date_week_parity" => intval($date6->format('W')) % 2,
            "begin_hour" => "17:30",
            "end_hour" => "19:00",
            "do_every_two_weeks" => true
        ]);

        $date7 = Date::parse("21-04-2022");
        Event::create([
            "name" => "DS de chinois",
            "description" => "Très dur",
            "first_date" => $date7,
            "first_date_day_name" => $date7->format('l'),
            "first_date_week_parity" => intval($date7->format('W')) % 2,
            "begin_hour" => "06:00",
            "end_hour" => "07:30"
        ]);

    }
}
