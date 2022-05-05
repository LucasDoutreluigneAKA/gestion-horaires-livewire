<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Jenssegers\Date\Date;
use App\Models\Event;
use Faker\Factory as Faker;

class EventRegistrationModal extends EventManipulationModal
{

    public $serie_edition_enabled;
    public $change_recursivity_enabled;

    public $listeners = [
        'clear-registration' => 'clearAttributes',
        'changeEvent' => 'readEventData',
        'setSerieEditionEnabled' => 'setSerieEditionEnabled',
        'setChangeRecursivityEnabled' => 'setChangeRecursivityEnabled'
    ];

    public function mount()
    {
        $this->serie_edition_enabled = false;
        $this->change_recursivity_enabled = true;
        $this->recursivity = "one-time";
        $this->period = 1;
        // dd($this);
    }

    public function submit()
    {
        $faker = Faker::create();
        $this->serie = $faker->uuid;

        $this->validate();

        // dd($this);

        /* ID renseigné : édition d'évènement */
        /* ID non renseigné : création d'évènement
                              récursivité si nécessaire
        */
        if(!isset($this->event_id) || $this->event_id === null)
        {
            $this->createEvent($this->date);

            if($this->change_recursivity_enabled)
            {
                $this->generateRecursiveEvents($this->date);
            }
        }
        else
        {
            $event = $this->updateEvent();

            if($this->serie_edition_enabled)
            {
                $this->updateSerie($event->serie);
            }

            // AJOUTER MODIFICATIONS RECURSIVE
        }

        $this->clearAttributes();

        $this->emit('refreshWeekEvents');
        $this->dispatchBrowserEvent('unlock-page');
    }

    public function readEventData($data)
    {
        $event = Event::find($data['event_id']);
        // dd($event);
        $this->event_id = $data['event_id'];
        $this->serie = $event->serie;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->date = Date::parse($event->date)->format('Y-m-d');
        $this->begin_hour = $event->begin_hour;
        $this->end_hour = $event->end_hour;

        $this->change_recursivity_enabled = $data['change_recursivity_enabled'];
        $this->serie_edition_enabled = $data['serie_edition_enabled'];
        // dd($this);
    }

    public function createEvent($date)
    {
        $parsedDate = Date::parse($date);
        $event = new Event;
        $event->serie = $this->serie;
        $event->name = $this->name;
        $event->description = $this->description;
        $event->date = $parsedDate;
        $event->begin_hour = $this->begin_hour;
        $event->end_hour = $this->end_hour;
        $event->save();
        return $event;
    }

    public function updateEvent()
    {
        $parsedDate = Date::parse($this->date);
        $event = Event::find($this->event_id);
        $event->name = $this->name;
        $event->description = $this->description;
        $event->date = $parsedDate;
        $event->begin_hour = $this->begin_hour;
        $event->end_hour = $this->end_hour;
        $event->save();
        return $event;
    }

    public function updateSerie($serie)
    {

        // Ce code supprime tous les évènements de la série sauf
        // le premier. Il recrée les évènements suivants selon
        // la récursivité et la période choisie.

        $firstEventOfSerie =
            Event::where('serie', $serie)
            ->orderBy('id', 'asc')
            ->first();

        $this->serie = $serie;
        Event::where('serie', $serie)->delete();

        $newFirstEventOfSerie = new Event;
        $newFirstEventOfSerie->serie = $this->serie;
        $newFirstEventOfSerie->name = $this->name;
        $newFirstEventOfSerie->description = $this->description;
        $newFirstEventOfSerie->date = $firstEventOfSerie->date;
        $newFirstEventOfSerie->begin_hour = $this->begin_hour;
        $newFirstEventOfSerie->end_hour = $this->end_hour;
        $newFirstEventOfSerie->save();

        $this->generateRecursiveEvents($firstEventOfSerie->date);




        // Ce code met à jour les évènements déjà enregistrés qui
        // appartiennent à la série. Il ne prend pas en charge
        // les modifications de récursivités et de périodes.

        // $serieEvents = Event::where('serie', $serie)->get();
        // $parsedDate = Date::parse($this->date);

        // foreach($serieEvents as $eventOfSerie)
        // {
        //     // $eventOfSerie->name = $this->name;
        //     // $eventOfSerie->description = $this->description;
        //     // $eventOfSerie->date = $parsedDate;
        //     $eventOfSerie->begin_hour = $this->begin_hour;
        //     $eventOfSerie->end_hour = $this->end_hour;
        //     $eventOfSerie->save();
        // }
    }

    public function generateRecursiveEvents($initialDate)
    {
        $initialDate = Date::parse($initialDate);
        $recursiveDate = null;

        for($week = 0; $week < $this->period; $week++)
        {
            if($this->recursivity === "every-day")
            {
                for($i = 0; $i < 7; $i++)
                {
                    if(!($i === 0 && $week === 0))
                    {
                        $recursiveDate = $initialDate->copy()->addDays($i + 7 * $week);

                        if($recursiveDate->dayOfWeek > 0 && $recursiveDate->dayOfWeek <= 5)
                        {
                            $recursiveEvent = $this->createEvent($recursiveDate);
                        }

                    }
                }
            }
            else if($this->recursivity === "every-week")
            {
                if($week > 0)
                {
                    $recursiveDate = $initialDate->copy()->addDays(7 * $week);
                    $recursiveEvent = $this->createEvent($recursiveDate);
                }
            }
            else if($this->recursivity === "every-two-weeks")
            {
                if($week > 0 && $week % 2 === 0)
                {
                    $recursiveDate = $initialDate->copy()->addDays(7 * $week);
                    $recursiveEvent = $this->createEvent($recursiveDate);
                }

            }
        }
    }

    public function clearAttributes()
    {
        parent::clearAttributes();
    }

    public function setSerieEditionEnabled($value)
    {
        $this->serie_edition_enabled = $value;
    }

    public function setChangeRecursivityEnabled($value)
    {
        $this->change_recursivity_enabled = $value;
    }

    public function render()
    {
        return view('livewire.modals.event-registration-modal');
    }
}
