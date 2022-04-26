<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalendarMenu extends Component
{

    public $viewWeekMode = "week";

    public function changeViewMode($mode)
    {
        $this->emit('changeViewMode', $mode);
        $this->viewWeekMode = $mode;
    }

    public function render()
    {
        return view('livewire.calendar-menu');
    }
}
