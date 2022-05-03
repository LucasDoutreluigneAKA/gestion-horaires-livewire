<?php

namespace App\Http\Livewire\Modals;
use App\Models\Event;

use Livewire\Component;

class EventDeleteModal extends Component
{

    public $event_id;

    public $listeners = [
        'change-event-id' => 'changeEventID'
    ];

    public function submit($formData)
    {
        Event::find($this->event_id)->first()->delete();
        $this->emit('refreshWeekEvents');
        $this->dispatchBrowserEvent('unlock-page');
    }

    public function changeEventID($event_id)
    {
        $this->event_id = $event_id;
    }

    public function render()
    {
        return view('livewire.modals.event-delete-modal');
    }
}
