<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Jenssegers\Date\Date;
use App\Models\Event;

class EventRegistrationModal extends EventManipulationModal
{

    public $listeners = [
        'clear-registration' => 'clearAttributes',
        'change-event-id' => 'readEventData'
    ];

    public function submit()
    {
        $this->validate();
        $parsedDate = Date::parse($this->date);
        $event = null;

        // dd($this);
        if(!isset($this->event_id) || $this->event_id === null)
            $event = new Event;
        else
            $event = Event::find($this->event_id)->first();


        $event->name = $this->name;
        $event->description = $this->description;
        $event->first_date = $parsedDate;
        $event->first_date_day_name = $parsedDate->format('D');
        $event->first_date_week_parity = intval($parsedDate->format('W')) % 2;
        $event->begin_hour = $this->begin_hour;
        $event->end_hour = $this->end_hour;
        $event->do_every_day = $this->every_day === null ? 0 : 1;
        $event->do_every_week = $this->every_week === null ? 0 : 1;
        $event->do_every_two_weeks = $this->every_two_weeks === null ? 0 : 1;
        $event->save();

        $this->emit('refreshWeekEvents');
        $this->dispatchBrowserEvent('unlock-page');
    }

    public function readEventData($data)
    {
        $event = Event::find($data['event_id']);
        // dd($event);
        $this->event_id = $data['event_id'];
        $this->name = $event->name;
        $this->description = $event->description;
        $this->date = $event->first_date;
        $this->begin_hour = $event->begin_hour;
        $this->end_hour = $event->end_hour;
        $this->every_day = $event->do_every_day;
        $this->every_week = $event->do_every_week;
        $this->every_two_weeks = $event->do_every_two_weeks;
    }

    public function render()
    {
        return view('livewire.modals.event-registration-modal');
    }
}
