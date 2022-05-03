<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Jenssegers\Date\Date;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class EventInsertModal extends EventManipulationModal
{

    public function submit($formData)
    {
        $this->validate();

        $parsedDate = Date::parse($formData['date']);
        Event::create([
            "name" => $formData['name'],
            "description" => $formData['description'],
            "first_date" => $parsedDate,
            "first_date_day_name" => $parsedDate->format('D'),
            "first_date_week_parity" => intval($parsedDate->format('W')) % 2,
            "begin_hour" => $formData['begin_hour'],
            "end_hour" => $formData['end_hour'],
            "do_every_day" => isset($formData['every_day']) ? 1 : 0,
            "do_every_week" => isset($formData['every_week']) ? 1 : 0,
            "do_every_two_weeks" => isset($formData['every_two_weeks']) ? 1 : 0
        ]);

        $this->emit('refreshWeekEvents');
        $this->dispatchBrowserEvent('unlock-page');
    }

    public function render()
    {
        return view('livewire.modals.event-insert-modal');
    }
}
