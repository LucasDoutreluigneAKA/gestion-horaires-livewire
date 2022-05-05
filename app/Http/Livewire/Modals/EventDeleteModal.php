<?php

namespace App\Http\Livewire\Modals;
use App\Models\Event;
use Livewire\Component;

class EventDeleteModal extends Component
{

    public $event_id;
    public $serie;
    public $serie_deletion_enabled;

    public $listeners = [
        'deleteEvent' => 'changeData'
    ];

    public function submit()
    {
        // dd(Event::find($this->event_id) === null);
        Event::find($this->event_id)->delete();

        if($this->serie_deletion_enabled)
        {
            Event::where('serie', $this->serie)->delete();
        }

        $this->emit('refreshWeekEvents');
        $this->dispatchBrowserEvent('unlock-page');
    }

    public function changeData($data)
    {
        $this->event_id = $data['event_id'];
        $this->serie = $data['serie'];
        $this->serie_deletion_enabled = $data['serie_deletion_enabled'];
        // dd($this);
    }

    public function render()
    {
        return view('livewire.modals.event-delete-modal');
    }
}
