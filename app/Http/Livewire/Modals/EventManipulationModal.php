<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Jenssegers\Date\Date;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

/**
 * @property $date
 * @property $begin_hour
 * @property $end_hour
 * @property $name
 * @property $description
 * @property $every_day
 * @property $every_week
 * @property $every_two_weeks
 */
class EventManipulationModal extends Component
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

    protected $rules = [
        'date' => ['required', 'date'],
        'begin_hour' => ['required', 'date_format:H:i'],
        'end_hour' => ['required', 'date_format:H:i'],
        "name" => ["required", 'string', 'max:255'],
        "description" => ["required", 'string', 'max:500']
    ];

    /**
     * Messages d'erreurs pour chaque problème de validation
     */
    protected $messages = [
        "date.required" => "Veuillez saisir une date.",
        "date.date" => "La date entrée est invalide.",

        "begin_hour.required" => "Veuillez saisir une heure de début.",
        "begin_hour.date_format" => "Le format de l'heure est invalide.",

        "end_hour.required" => "Veuillez saisir une heure de fin.",
        "end_hour.date_format" => "Le format de l'heure est invalide.",

        "name.required" => "Veuillez saisir un nom.",
        "name.string" => "Veuillez saisir un nom.",
        "name.max" => "Le nom ne doit pas dépasser 255 caractères.",

        "description.required" => "Veuillez saisir une description.",
        "description.string" => "Veuillez saisir une description.",
        "description.max" => "La description ne doit pas dépasser 500 caractères."
    ];

    /* Méthode appelée à chaque mise à jour de propriétée */
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
        $this->validate();
    }

    public function clearAttributes()
    {
        $this->event_id = null;
        $this->date = null;
        $this->begin_hour = null;
        $this->end_hour = null;
        $this->name = null;
        $this->description = null;
        $this->every_day = null;
        $this->every_week = null;
        $this->every_two_weeks = null;
    }

    public function render()
    {
        return view('livewire.modals.event-manipulation-modal');
    }
}
