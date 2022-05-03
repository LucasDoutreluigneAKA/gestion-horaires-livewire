<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Event;
use Jenssegers\Date\Date;

class EventEditModal extends EventManipulationModal
{

    public $event_id;
    public $date;
    public $begin_hour;
    public $end_hour;
    public $name;
    public $description;
    public $every_day;
    public $every_week;
    public $every_two_weeks;

    public $listeners = [
        'edit-event' => 'editEvent'
    ];

    public function submit($formData)
    {
        $this->validate();

        $parsedDate = Date::parse($formData['date']);
        $event = Event::find($this->event_id)->first();
        $event->name = $formData['name'];
        $event->description = $formData['description'];
        $event->first_date = $parsedDate;
        $event->first_date_day_name = $parsedDate->format('D');
        $event->first_date_week_parity = intval($parsedDate->format('W')) % 2;
        $event->begin_hour = $formData['begin_hour'];
        $event->end_hour = $formData['end_hour'];
        $event->do_every_day = isset($formData['every_day']) ? 1 : 0;
        $event->do_every_week = isset($formData['every_week']) ? 1 : 0;
        $event->do_every_two_weeks = isset($formData['every_two_weeks']) ? 1 : 0;
        $event->save();

        $this->emit('refreshWeekEvents');
        $this->emit('$refresh');
        $this->dispatchBrowserEvent('unlock-page');
    }

    public function editEvent($event_id)
    {
        $event = Event::find($event_id)->first();
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($event->first_date);

        $this->event_id = $event_id;
        $this->date = Date::parse($event->first_date);
        $this->begin_hour = $event->begin_hour;
        $this->end_hour = $event->end_hour;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->every_day = $event->do_every_day;
        $this->every_week = $event->do_every_week;
        $this->every_two_weeks = $event->do_every_two_weeks;
    }

    public function render()
    {
        return view('livewire.modals.event-edit-modal');
    }
}
