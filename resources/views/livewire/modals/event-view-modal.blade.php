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
            <span class="information">@if ($this->date != null) {{ $this->date->format('d/m/Y') }} @endif</span>
        </div>

        <div class="modal-half-container left">
            <span class="label">Heure de début</span>
            <span class="information">{{ $this->begin_hour }}</span>
        </div>

        <div class="modal-half-container right">
            <span class="label">Heure de fin</span>
            <span class="information">{{ $this->end_hour }}</span>
        </div>

        <div class="modal-half-container left">
            <button
                id="edit"
                wire:click="sendEditEvent">Modifier</button>
        </div>

        <div class="modal-half-container right">
            <button
                id="edit"
                wire:click="sendEditSerie">Modifier en série</button>
        </div>

        <div class="modal-half-container left">
            <button
                id="delete"
                wire:click="sendDeleteEvent">Supprimer</button>
        </div>

        <div class="modal-half-container right">
            <button
                id="delete"
                wire:click="sendDeleteSerie">Supprimer en série</button>
        </div>

    </div>
</div>
