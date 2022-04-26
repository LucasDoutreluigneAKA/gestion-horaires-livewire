<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jenssegers\Date\Date;

class CalendarDatePicker extends Component
{
    public $weekDatesList = [];
    public $selectorIndex = 3;

    public function mount()
    {
        $this->updatePickerButtonsData();
    }

    public function updatePrinter($index)
    {
        $this->emit('updateViewedWeek', $this->weekDatesList[$index]['start']);
        $this->selectorIndex = $index;
    }


    public function updatePicker($index)
    {
        $this->updatePickerButtonsData($this->weekDatesList[$index]['start']);
        if($index < 3) $this->selectorIndex++;
        else if($index > 3) $this->selectorIndex--;
    }


    public function updatePickerButtonsData($date = null)
    {

        // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $out->writeln("date = " .$date);

        $day = "";
        if($date == null || !Date::isValidDate($date)){
            $day = Date::now();
        }
        else{
            $day = Date::parse($date);
        }

        $this->weekDatesList = [
            '0' => [
                'start' => Date::parse($date)->startOfWeek()->sub("21 day")->format('d-m-Y'),
                'end' => Date::parse($date)->startOfWeek()->sub("17 day")->format('d-m-Y')
            ],

            '1' => [
                'start' => Date::parse($date)->startOfWeek()->sub("14 day")->format('d-m-Y'),
                'end' => Date::parse($date)->startOfWeek()->sub("10 day")->format('d-m-Y')
            ],

            '2' => [
                'start' => Date::parse($date)->startOfWeek()->sub("7 day")->format('d-m-Y'),
                'end' => Date::parse($date)->startOfWeek()->sub("3 day")->format('d-m-Y')
            ],

            '3' => [
                'start' => Date::parse($date)->startOfWeek()->format('d-m-Y'),
                'end' => Date::parse($date)->startOfWeek()->add("4 day")->format('d-m-Y')
            ],

            '4' => [
                'start' => Date::parse($date)->startOfWeek()->add("7 day")->format('d-m-Y'),
                'end' => Date::parse($date)->startOfWeek()->add("11 day")->format('d-m-Y')
            ],

            '5' => [
                'start' => Date::parse($date)->startOfWeek()->add("14 day")->format('d-m-Y'),
                'end' => Date::parse($date)->startOfWeek()->add("18 day")->format('d-m-Y')
            ],

            '6' => [
                'start' => Date::parse($date)->startOfWeek()->add("21 day")->format('d-m-Y'),
                'end' => Date::parse($date)->startOfWeek()->add("25 day")->format('d-m-Y')
            ]
        ];
    }


    public function render()
    {
        return view('livewire.calendar-date-picker');
    }
}
