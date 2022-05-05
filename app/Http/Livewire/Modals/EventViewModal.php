<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Event;
use Jenssegers\Date\Date;

class EventViewModal extends Component
{
    public $event_id;
    public $serie;
    public $date;
    public $begin_hour;
    public $end_hour;
    public $name;
    public $description;

    public $listeners = [
        'view-event' => 'viewEvent'
    ];

    public function viewEvent($id)
    {
        $event = Event::findOrFail($id);
        $this->serie = $event->serie;
        $this->event_id = $event->id;
        $this->date = $event->date;
        $this->begin_hour = $event->begin_hour;
        $this->end_hour = $event->end_hour;
        $this->name = $event->name;
        $this->description = $event->description;

        // dd($this);

        $this->dispatchBrowserEvent('lock-page');
        $this->dispatchBrowserEvent('open-event-view-modal');
    }

    public function sendEditEvent()
    {
        $this->emit('changeEvent', [
            'event_id' => $this->event_id,
            'serie' => $this->serie,
            'serie_edition_enabled' => false,
            'change_recursivity_enabled' => false
        ]);

        // dd($this);

        $this->dispatchBrowserEvent('close-event-view-modal');
        $this->dispatchBrowserEvent('open-event-registration-modal');
    }

    public function sendEditSerie()
    {
        $this->emit('changeEvent', [
            'event_id' => $this->event_id,
            'serie' => $this->serie,
            'serie_edition_enabled' => true,
            'change_recursivity_enabled' => true
        ]);

        // dd($this);

        $this->dispatchBrowserEvent('close-event-view-modal');
        $this->dispatchBrowserEvent('open-event-registration-modal');
    }

    public function sendDeleteEvent()
    {
        $this->emit('deleteEvent', [
            'event_id' => $this->event_id,
            'serie' => $this->serie,
            'serie_deletion_enabled' => false
        ]);

        $this->dispatchBrowserEvent('close-event-view-modal');
        $this->dispatchBrowserEvent('open-event-delete-modal');
    }

    public function sendDeleteSerie()
    {
        $this->emit('deleteEvent', [
            'event_id' => $this->event_id,
            'serie' => $this->serie,
            'serie_deletion_enabled' => true
        ]);

        $this->dispatchBrowserEvent('close-event-view-modal');
        $this->dispatchBrowserEvent('open-event-delete-modal');
    }

    public function render()
    {
        return view('livewire.modals.event-view-modal');
    }
}
