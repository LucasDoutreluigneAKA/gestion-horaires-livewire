<div
    x-data="{open: false}"
    x-show="open"
    wire:view-event.window="viewEvent({id})"
    x-on:open-event-view-modal.window="open = true"
    x-on:close-event-view-modal.window="open = false"
    x-on:close-all.window="open = false"
    id="event-view-modal"
    class="modal "
    x-show="open">
    <h1>Récapitulatif</h1>
    <div class="modal-content">

        <div class="modal-full-container">
            <span class="label">Nom</span>
            <span class="information">{{ $this->name }}</span>
        </div>

        <div class="modal-full-container">
            <span class="label">Description</span>
            <span class="information">{{ $this->description }}</span>
        </div>

        <div class="modal-full-container">
            <span class="label">Date</span>
            <span class="information">@if ($this->date != null) {{ $this->date->format('m-d-Y') }} @endif</span>
        </div>

        <div class="modal-half-container left">
            <span class="label">Heure de début</span>
            <span class="information">{{ $this->begin_hour }}</span>
        </div>

        <div class="modal-half-container right">
            <span class="label">Heure de fin</span>
            <span class="information">{{ $this->end_hour }}</span>
        </div>

        <div class="modal-full-container">
            <span class="label">Répétitions</span>
            @if ($this->every_day === 1) <span class="information">Tous les jours</span>
            @elseif ($this->every_week === 1) <span class="information">Toutes les semaines</span>
            @elseif ($this->every_two_weeks === 1) <span class="information">Toutes les deux semaines</span>
            @else <span class="information">Aucune répétition</span>
            @endif
        </div>

        <div class="modal-half-container left">
            <button
                id="edit"
                wire:click="emitEditEvent">Modifier</button>
        </div>

        <div class="modal-half-container right">
            <button
                id="delete"
                wire:click="emitDeleteEvent">Supprimer</button>
        </div>

    </div>
</div>
