<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jenssegers\Date\Date;
use App\Http\Controllers\EventsPerWeekController;

class CalendarDatePrinter extends Component
{

    public $viewedWeek = [];
    public $viewWeekMode = 'week';
    public $z_index = 0;

    protected $listeners = [
        'updateViewedWeek' => 'updateViewedWeek',
        'changeViewMode' => 'changeViewMode',
        '$refresh',
        'refreshWeekEvents'
    ];


    public function mount()
    {
        $this->updateViewedWeek();
    }

    public function refreshWeekEvents()
    {
        $this->updateViewedWeek(Date::parse($this->viewedWeek['monday']['date'])->format('d-m-Y'));
    }

    public function changeViewMode($mode)
    {
        $this->viewWeekMode = $mode;
        Date::setLocale('fr');
        // ddd($this->viewedWeek);
    }

    public function convertHoursToPixels($hours)
    {
        /*
            Etant donné qu'une case fait 80px de haut,
            1px = 1 minute;
         */
        $multiplier = 80 / 60;


        $data = explode(":", $hours);
        $pixels = $multiplier * (intval($data[0]) * 60 + intval($data[1]));
        return $pixels;
    }

    public function convertDurationToPixels($begin, $end)
    {
        /*
            Etant donné qu'une case fait 80px de haut,
            1px = 1 minute;
         */
        $multiplier = 80 / 60;


        $beginData = explode(":", $begin);
        $beginMinuts = (intval($beginData[0]) * 60 + intval($beginData[1]));

        $endData = explode(":", $end);
        $endMinuts = (intval($endData[0]) * 60 + intval($endData[1]));

        $pixels = $multiplier * ($endMinuts - $beginMinuts - 16);
        return $pixels;
    }

    public function updateViewedWeek($date = null)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln('Query receved for update at ' . $date);
        Date::setLocale('fr');

        $day = null;
        if($date == null || !Date::isValidDate($date)){
            $day = Date::now();
        }
        else{
            $day = Date::parse($date);
        }

        $this->viewedWeek = [
            'monday' => [
                'date' => Date::parse($day)->startOfWeek(),
                'events' => []
            ],

            'tuesday' => [
                'date' => Date::parse($day)->startOfWeek()->add('1 day'),
                'events' => []
            ],

            'wednesday' => [
                'date' => Date::parse($day)->startOfWeek()->add('2 day'),
                'events' => []
            ],

            'thursday' => [
                'date' => Date::parse($day)->startOfWeek()->add('3 day'),
                'events' => []
            ],

            'friday' => [
                'date' => Date::parse($day)->startOfWeek()->add('4 day'),
                'events' => []
            ]
        ];

        // ddd($day->startOfWeek());
        // ddd($this->viewedWeek);

        $eventsOfWeek = EventsPerWeekController::getEventsOfWeek($day->format('d-m-Y'));

        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $out->writeln("event: " . $event->id . " begin: " . $event->begin_hour);

        // foreach ($eventsOfWeek as $event){
        //     $out->writeln(collect($event) . "\ndo_every_day = " . $event->do_every_day);
        // }


        foreach($eventsOfWeek as $event)
        {
            // dd(Date::parse($event->date)->format('d-m-Y'));
            foreach ($this->viewedWeek as $index => $weekDay){

                // $out->writeln($index . "\n" . $weekDay['date'] . "\n\n");
                // $this->viewedWeek[$index]['events'][] = collect($event);

                /* Jour correspondant */
                /* Tous les jours */
                /* Chaque semaine, jour correspondant*/
                /* Toutes les deux semaines, jour correspondant */
                if(
                    Date::parse($event->date)->format('d-m-Y') == $weekDay['date']->format('d-m-Y')
                )
                {
                    /* Enregistrement de l'évènement dans la liste */
                    $this->viewedWeek[$index]['events'][] = collect($event);
                    // ddd($this->viewedWeek[$index]);
                }
            }

        }

        // ddd($this->viewedWeek);
    }

    public function convertDayNameToPercentage($index)
    {
        if($index == "monday") return 0;
        if($index == "tuesday") return 20;
        if($index == "wednesday") return 40;
        if($index == "thursday") return 60;
        if($index == "friday") return 80;
    }

    public function sendResetForm()
    {
        $this->emit('clear-registration');
        $this->emit('setSerieEditionEnabled', false);
        $this->emit('setChangeRecursivityEnabled', true);
    }


    public function render()
    {
        return view('livewire.calendar-date-printer');
    }
}
