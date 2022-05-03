<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Event;
use Jenssegers\Date\Date;

class EventViewModal extends Component
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
        'view-event' => 'viewEvent'
    ];

    public function viewEvent($id)
    {
        $event = Event::findOrFail($id);
        $this->event_id = $event->id;
        $this->date = Date::parse($event->date);
        $this->begin_hour = $event->begin_hour;
        $this->end_hour = $event->end_hour;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->every_day = $event->do_every_day;
        $this->every_week = $event->do_every_week;
        $this->every_two_weeks = $event->do_every_two_weeks;

        $this->dispatchBrowserEvent('lock-page');
        $this->dispatchBrowserEvent('open-event-view-modal');
    }

    public function emitEditEvent()
    {
        $this->emit('edit-event', [
            'event_id' => $this->event_id
        ]);
        $this->dispatchBrowserEvent('close-event-view-modal');
        $this->dispatchBrowserEvent('open-event-edit-modal');
    }

    public function emitDeleteEvent()
    {
        $this->emit('change-event-id', [
            'event_id' => $this->event_id
        ]);
        $this->dispatchBrowserEvent('close-event-view-modal');
        $this->dispatchBrowserEvent('open-event-delete-modal');
    }

    public function render()
    {
        return view('livewire.modals.event-view-modal');
    }
}
